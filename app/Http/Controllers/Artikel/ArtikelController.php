<?php

namespace App\Http\Controllers\Artikel;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Throwable;

class ArtikelController extends Controller
{
    private const FOLDER = 'Artikel';

    public function __construct()
    {
        $this->middleware(['permission:Master Artikel']);
    }

    public function index(Request $request)
    {
        $query = DB::table('tbl_artikel')
            ->leftJoin('users', 'users.id', '=', 'tbl_artikel.id_user')
            ->leftJoin('m_kategori', 'm_kategori.id', '=', 'tbl_artikel.id_kategori')
            ->select('tbl_artikel.*', 
            'users.name as developer', 
            'm_kategori.name as kategori')->whereNull('tbl_artikel.id_hapus');

        if (Auth::id() !== 1) {
            $query->where('tbl_artikel.id_user', Auth::id());
        }

        if ($request->filled('id_kategori')) {
            $query->where('tbl_artikel.id_kategori', $request->id_kategori);
        }

        if ($request->filled('status')) {
            $query->where('tbl_artikel.status', $request->status);
        }

        if ($request->filled('cari')) {
            $query->where('tbl_artikel.judul', 'like', '%' . $request->cari . '%');
        }

        $artikels = $query->orderByDesc('tbl_artikel.id')->paginate(10)->withQueryString();

        if ($request->ajax()) {
            return response()->json([
                'data'       => $artikels->items(),
                'pagination' => (string) $artikels->links(),
            ]);
        }

        $kategoris = DB::table('m_kategori')->orderBy('name')->get();

        return view('artikel.index', compact('artikels', 'kategoris'));
    }

    public function create()
    {
        $kategoris = DB::table('m_kategori')->orderBy('name')->get();
        $nama_developer = Auth::user()->name;

        return view('artikel.create', compact('kategoris', 'nama_developer'));
    }

    public function store(Request $request)
    {
        $pathThumbnail = null;

        try {
            $pesan = [
                'required' => ':attribute Tidak Boleh Kosong.!',
                'min'      => ':attribute Minimal diisi :min karakter !',
                'max'      => ':attribute Maksimal diisi :max karakter !',
            ];

            $validator = Validator::make($request->all(), [
                'judul'       => ['required', 'max:255'],
                'id_kategori' => ['required'],
                'status'      => ['required'],
                'konten'      => ['required'],
                'thumbnail'   => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            ], $pesan);

            if ($validator->fails()) {
                toastr()->title('Gagal')->error($validator->errors()->first(), ['timeOut' => 5000]);
                return back()->withInput();
            }

            $tanggal = now()->format('Y/m');

            DB::beginTransaction();

            $artikelId = DB::table('tbl_artikel')->insertGetId([
                'id_user'     => Auth::id(),
                'id_kategori' => $request->id_kategori,
                'judul'       => $request->judul,
                'slug'        => $this->slugUnik($request->judul),
                'konten'      => $request->konten,
                'thumbnail'   => null,
                'status'      => $request->status,
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);

            $pathThumbnail = $this->simpanGambar($request->file('thumbnail'), $artikelId, $tanggal);
            DB::table('tbl_artikel')->where('id', $artikelId)->update(['thumbnail' => $pathThumbnail]);

            DB::commit();

            toastr()->success('Artikel berhasil ditambahkan!', ['timeOut' => 5000]);
            return redirect(url('admin/artikel'));

        } catch (Throwable $e) {
            if (DB::transactionLevel() > 0) {
                DB::rollBack();
            }

            if ($pathThumbnail) {
                File::delete(public_path($pathThumbnail));
            }

            Log::error('Artikel store gagal: ' . $e->getMessage());
            toastr()->error('Gagal! Terjadi kesalahan sistem.', ['timeOut' => 5000]);

            return back()->withInput();
        }
    }

    public function edit($id)
    {
        $artikel = DB::table('tbl_artikel')->where('id', $id)->whereNull('id_hapus')->first();

        if (!$artikel) {
            toastr()->error('Artikel tidak ditemukan!', ['timeOut' => 5000]);
            return redirect(url('admin/artikel'));
        }

        $kategoris = DB::table('m_kategori')->orderBy('name')->get();

        return view('artikel.edit', compact('artikel', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        $pathThumbnail = null;
        $pathLama = null;

        try {
            $artikel = DB::table('tbl_artikel')->where('id', $id)->whereNull('id_hapus')->first();

            if (!$artikel) {
                toastr()->error('Artikel tidak ditemukan!', ['timeOut' => 5000]);
                return back();
            }

            $pathThumbnail = $artikel->thumbnail;
            $pathLama = $artikel->thumbnail;

            $pesan = [
                'required' => ':attribute Tidak Boleh Kosong.!',
                'min'      => ':attribute Minimal diisi :min karakter !',
                'max'      => ':attribute Maksimal diisi :max karakter !',
            ];

            $validator = Validator::make($request->all(), [
                'judul'       => ['required', 'max:255'],
                'id_kategori' => ['required'],
                'status'      => ['required'],
                'konten'      => ['required'],
                'thumbnail'   => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            ], $pesan);

            if ($validator->fails()) {
                foreach ($validator->errors()->all() as $gagal) {
                    toastr()->error($gagal, ['timeOut' => 5000]);
                }
                return back()->withInput();
            }

            $tanggal = Carbon::parse($artikel->created_at)->format('Y/m');

            DB::beginTransaction();

            if ($request->hasFile('thumbnail')) {
                $pathThumbnail = $this->simpanGambar($request->file('thumbnail'), $artikel->id, $tanggal);
            }

            DB::table('tbl_artikel')->where('id', $artikel->id)->update([
                'id_kategori' => $request->id_kategori,
                'judul'       => $request->judul,
                'slug'        => $this->slugUnik($request->judul, $artikel->id),
                'konten'      => $request->konten,
                'thumbnail'   => $pathThumbnail,
                'status'      => $request->status,
                'updated_at'  => now(),
            ]);

            DB::commit();

            if ($request->hasFile('thumbnail') && $pathLama) {
                File::delete(public_path($pathLama));
            }

            toastr()->success('Artikel berhasil diperbarui!', ['timeOut' => 5000]);
            return redirect(url('admin/artikel'));

        } catch (Throwable $e) {
            if (DB::transactionLevel() > 0) {
                DB::rollBack();
            }

            if ($pathThumbnail && $pathThumbnail !== $pathLama) {
                File::delete(public_path($pathThumbnail));
            }

            Log::error('Artikel update gagal: ' . $e->getMessage());
            toastr()->error('Gagal! Terjadi kesalahan sistem.', ['timeOut' => 5000]);

            return back()->withInput();
        }
    }

    public function destroy($id)
    {
        $artikel = DB::table('tbl_artikel')->where('id', $id)->whereNull('id_hapus')->first();

        if (!$artikel) {
            return response()->json(['status' => 'error']);
        }

        $tanggal = Carbon::parse($artikel->created_at)->format('Y/m');
        $folderArtikel = public_path(self::FOLDER . '/' . $tanggal . '/' . $artikel->id);

        if (File::isDirectory($folderArtikel)) {
            File::deleteDirectory($folderArtikel);
        }

        DB::table('tbl_artikel')->where('id', $artikel->id)->update([
            'id_hapus'   => Auth::id(),
            'updated_at' => now(),
        ]);

        return response()->json(['status' => 'success']);
    }

    private function simpanGambar($file, int $artikelId, string $tanggal): string
    {
        $folder = self::FOLDER . '/' . $tanggal . '/' . $artikelId . '/thumbnail';
        $tujuan = public_path($folder);

        if (!File::isDirectory($tujuan)) {
            File::makeDirectory($tujuan, 0755, true);
        }

        $ekstensi = strtolower($file->extension() ?: $file->getClientOriginalExtension());
        $namaFile = now()->format('YmdHis') . '_' . Str::random(8) . '.' . $ekstensi;

        $file->move($tujuan, $namaFile);

        return $folder . '/' . $namaFile;
    }

    private function slugUnik(string $judul, ?int $idAbaikan = null): string
    {
        $dasar = substr(Str::slug($judul) ?: 'artikel', 0, 200);

        $dipakai = DB::table('tbl_artikel')
            ->whereNull('id_hapus')
            ->where(function ($q) use ($dasar) {
                $q->where('slug', $dasar)
                  ->orWhere('slug', 'like', $dasar . '-%');
            })
            ->when($idAbaikan !== null, function ($q) use ($idAbaikan) {
                $q->where('id', '!=', $idAbaikan);
            })
            ->pluck('slug')
            ->all();

        $dipakai = array_flip($dipakai);
        $slug = $dasar;
        $n = 2;

        while (isset($dipakai[$slug])) {
            $slug = $dasar . '-' . $n++;
        }

        return $slug;
    }
}