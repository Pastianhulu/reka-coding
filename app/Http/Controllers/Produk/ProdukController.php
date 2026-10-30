<?php

namespace App\Http\Controllers\Produk;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;


class ProdukController extends Controller
{   
    private const FOLDER = 'Produk';

    public function __construct()
    {
        $this->middleware(['permission:Master Produk']);
    }

    public function index(Request $request)
    {
        $query = DB::table('tbl_produk')
            ->leftJoin('users', 'users.id', '=', 'tbl_produk.id_user')
            ->leftJoin('m_kategori', 'm_kategori.id', '=', 'tbl_produk.id_kategori')
            ->select('tbl_produk.*', 'users.name as developer_name', 'm_kategori.name as kategori_name')
            ->whereNull('tbl_produk.id_hapus');

        if (Auth::id() !== 1) {
            $query->where('tbl_produk.id_user', Auth::id());
        }

        if ($request->filled('tipe')) {
            $query->where('tbl_produk.tipe', $request->tipe);
        }

        if ($request->filled('id_kategori')) {
            $query->where('tbl_produk.id_kategori', $request->id_kategori);
        }

        if ($request->has('status')) {
            if ($request->filled('status')) {
                $query->where('tbl_produk.status', $request->status);
            }
        } else {
            $query->where('tbl_produk.status', 'Y');
        }

        if ($request->filled('cari')) {
            $query->where('tbl_produk.judul', 'like', '%'.$request->cari.'%');
        }

        $produks = $query->orderByDesc('tbl_produk.id')->paginate(10)->withQueryString();
        $kategoris = DB::table('m_kategori')->orderBy('name')->get();

        return view('produk.index', compact('produks', 'kategoris'));
    }

    public function create()
    {
        $kategoris = DB::table('m_kategori')->orderBy('name')->get();
        $developer = Auth::user()->name;

        return view('produk.create', compact('kategoris', 'developer'));
    }

    public function store(Request $request)
    {
        $pathThumbnail = null;

        try {
            $pesan = [
                'required' => ':attribute Tidak Boleh Kosong.!',
                'min' => ':attribute Minimal diisi :min karakter !',
                'max' => ':attribute Maksimal diisi  :max karakter !',
            ];

            $validator = Validator::make($request->all(), [
                'judul'        => ['required'],
                'id_kategori'  => ['required'],
                'tipe'         => ['required'],
                'status'       => ['required'],
                'deskripsi'    => ['required'],
                'thumbnail'    => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
                'gambar'       => ['nullable', 'array'],
                'gambar.*'     => ['image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            ], $pesan);

            if ($validator->fails()) {
                toastr()->title('Gagal')->error($validator->errors()->first(), ['timeOut' => 5000]);
                return back()->withInput(); 
            }

            $id_user = Auth::id();
            $tanggal = now()->format('Y/m');
            
            DB::beginTransaction();

            $produk = DB::table('tbl_produk')->insertGetId([
                'id_user'       => $id_user, 
                'id_kategori'   => $request->id_kategori,
                'judul'         => $request->judul,
                'slug'          => $this->uniqueSlug($request->judul),
                'deskripsi'     => $request->deskripsi,
                'thumbnail'     => null,
                'status'        => $request->status,
                'harga'         => $request->harga, 
                'tipe'          => $request->tipe,
                'link_drive'    => $request->link_drive,
                'link_github'   => $request->link_github,
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);

            if ($request->hasFile('thumbnail')) {
                $pathThumbnail = $this->storeImage($request->file('thumbnail'), 'thumbnail', $produk, $tanggal);
                DB::table('tbl_produk')->where('id', $produk)->update(['thumbnail' => $pathThumbnail]);
            }

            $this->storeGallery($produk, $request->file('gambar') ?: [], $tanggal);

            DB::commit();

            toastr()->success('Produk berhasil ditambahkan!', ['timeOut' => 5000]);
            return redirect()->route('produk.index');

            } catch (\Throwable $e) {
                if (DB::transactionLevel() > 0) {
                    DB::rollBack();
                }

                if ($pathThumbnail) {
                    File::delete(public_path($pathThumbnail));
                }

            Log::error('Produk update gagal: '.$e->getMessage());
            toastr()->error('Gagal! Terjadi kesalahan sistem.', ['timeOut' => 5000]);

            return back()->withInput();
        }
    }

    public function edit($id)
    {
        $produk = DB::table('tbl_produk')->where('id', $id)->whereNull('id_hapus')->first();
        
        if (!$produk) {
            toastr()->error('Produk tidak ditemukan!', ['timeOut' => 5000]);
            return redirect()->route('produk.index');
        }

       
        $kategoris = DB::table('m_kategori')->orderBy('name')->get();
        $galeri = DB::table('tbl_produk_gambar')->where('id_produk', $produk->id)->orderBy('urutan')->orderBy('id')->get();
        $developers = (Auth::id() === 1) ? User::role('admin')->orderBy('name')->get() : collect();

        return view('produk.edit', compact('produk', 'kategoris', 'galeri', 'developers'));
    }

    public function update(Request $request, $id)
    {
       try {
            $produk = DB::table('tbl_produk')->where('id', $id)->whereNull('id_hapus')->first();
            
            if (!$produk) {
                toastr()->error('Produk tidak ditemukan!', ['timeOut' => 5000]);
                return back();
            }

            $pathThumbnail = $produk->thumbnail;  
            $pathLama = $produk->thumbnail;


            $pesan = [
                'required' => ':attribute Tidak Boleh Kosong.!',
                'min' => ':attribute Minimal diisi :min karakter !',
                'max' => ':attribute Maksimal diisi  :max karakter !',
            ];

            $validator = Validator::make($request->all(), [
                'judul'        => ['required'],
                'deskripsi'    => ['required'],
                'tipe'         => ['required'],
                'thumbnail'    => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
                'gambar'       => ['nullable', 'array'],
                'gambar.*'     => ['image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            ], $pesan);

            if ($validator->fails()) {
                foreach ($validator->errors()->all() as $gagal) {
                    toastr()->error($gagal, ['timeOut' => 5000]);
                }
                return back()->withInput(); 
            }

            $tanggal = Carbon::parse($produk->created_at)->format('Y/m');
            
            DB::beginTransaction();

            if ($request->hasFile('thumbnail')) {
                $pathThumbnail = $this->storeImage($request->file('thumbnail'), 'thumbnail', $produk->id, $tanggal);
            }

            DB::table('tbl_produk')->where('id', $produk->id)->update([
                'id_kategori'   => $request->id_kategori,
                'judul'         => $request->judul,
                'slug'          => $this->uniqueSlug($request->judul, $produk->id),
                'deskripsi'     => $request->deskripsi,
                'thumbnail'     => $pathThumbnail,
                'status'        => $request->status,
                'harga'         => $request->harga, 
                'tipe'          => $request->tipe,
                'link_drive'    => $request->link_drive,
                'link_github'   => $request->link_github,
                'updated_at'    => now(),
            ]);

            $this->storeGallery($produk->id, $request->file('gambar') ?: [], $tanggal);

            DB::commit();
            
            if ($request->hasFile('thumbnail') && $pathLama) {
                File::delete(public_path($pathLama));
            }

            toastr()->success('Produk berhasil diperbarui!', ['timeOut' => 5000]);
            return redirect()->route('produk.index');

            } catch (\Throwable $e) {
                if (DB::transactionLevel() > 0) {
                    DB::rollBack();
                }if ($pathThumbnail && $pathThumbnail !== $pathLama) {
                    File::delete(public_path($pathThumbnail));
                }

            Log::error('Produk update gagal: '.$e->getMessage());
            toastr()->error('Gagal! Terjadi kesalahan sistem.', ['timeOut' => 5000]);

            return back()->withInput();
        }
    }

    public function destroy($id)
    {
        $produk = DB::table('tbl_produk')->where('id', $id)->whereNull('id_hapus')->first();

        if ($produk) {
            // Ambil Tahun/Bulan dari created_at
            $tanggal = Carbon::parse($produk->created_at)->format('Y/m');
            $folderProduk = public_path(self::FOLDER . '/' . $tanggal . '/' . $produk->id);

            // Hapus folder spesifik produk ini
            if (File::isDirectory($folderProduk)) {
                File::deleteDirectory($folderProduk);
            }

            DB::table('tbl_produk')->where('id', $produk->id)->update([
                'id_hapus'   => Auth::id(),
                'updated_at' => now(),
            ]);
            
            return response()->json(['status' => 'success']);
        }

        return response()->json(['status' => 'error']);
    }

    public function destroyGambar($id)
    {
        $gambar = DB::table('tbl_produk_gambar')->where('id', $id)->first();

        if (! $gambar) {
            return response()->json(['status' => 'error']);
        }

        $pathGambar = public_path($gambar->path);
        if (File::exists($pathGambar)) {
            File::delete($pathGambar);
        }

        DB::table('tbl_produk_gambar')->where('id', $gambar->id)->delete();

        return response()->json(['status' => 'success']);
    }

    public function urutanGambar(Request $request)
    {
        $data = $request->validate([
            'urutan' => 'required|array',
            'urutan.*' => 'integer',
        ]);

        DB::transaction(function () use ($data) {
            foreach ($data['urutan'] as $urutan => $id) {
                DB::table('tbl_produk_gambar')->where('id', $id)->update([
                    'urutan' => $urutan,
                    'updated_at' => now(),
                ]);
            }
        });

        return response()->json(['status' => 'success']);
    }

    // ==========================================
    // FUNGSI BANTUAN (PRIVATE)
    // ==========================================

    private function storeImage($file, string $tipe, int $produk, string $tanggal): string
    {
        // Struktur: gambar/produk/2023/10/11/thumbnail
        $folder = self::FOLDER . '/' . $tanggal . '/' . $produk . '/' . $tipe;
        $destination = public_path($folder);

        if (! File::isDirectory($destination)) {
            File::makeDirectory($destination, 0755, true);
        }

        $extension = strtolower($file->extension() ?: $file->getClientOriginalExtension());
        $name = now()->format('YmdHis').'_'.Str::random(8).'.'.$extension;
        $file->move($destination, $name);

        return $folder  . '/' . $name; 
    }

    private function storeGallery(int $id, array $files, string $tanggal): void
    {
        $urutan = (int) DB::table('tbl_produk_gambar')->where('id_produk', $id)->max('urutan');

        foreach ($files as $file) {
            if (! $file) {
                continue;
            }

            $pathDetail = $this->storeImage($file, 'detail', $id, $tanggal);

            DB::table('tbl_produk_gambar')->insert([
                'id_produk' => $id,
                'path'      => $pathDetail,
                'urutan'    => ++$urutan,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function uniqueSlug(string $judul, ?int $ignoreId = null): string
    {
        $base = Str::slug($judul) ?: 'produk';
        $slug = $base;
        $counter = 2;

        while (DB::table('tbl_produk')->where('slug', $slug)
            ->when($ignoreId, function ($query) use ($ignoreId) {
                $query->where('id', '!=', $ignoreId);
            })
            ->exists()) {
            $slug = $base.'-'.$counter;
            $counter++;
        }

        return $slug;
    }
}