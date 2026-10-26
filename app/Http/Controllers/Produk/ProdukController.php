<?php

namespace App\Http\Controllers\Produk;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class ProdukController extends Controller
{
    private const THUMBNAIL_PATH = 'uploads/produk/thumbnail';

    private const GALLERY_PATH = 'uploads/produk/galeri';

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

        if (! $this->isAdminUtama()) {
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
        $developers = $this->developers();

        return view('produk.create', compact('kategoris', 'developers'));
    }

    public function store(Request $request)
    {
        $data = $this->validateProduk($request);
        $idUser = $this->resolveOwner($request);
        $thumbnail = null;

        try {
            DB::beginTransaction();

            if ($request->hasFile('thumbnail')) {
                $thumbnail = $this->storeImage($request->file('thumbnail'), self::THUMBNAIL_PATH);
            }

            $idProduk = DB::table('tbl_produk')->insertGetId([
                'id_user' => $idUser,
                'id_kategori' => $data['id_kategori'] ?? null,
                'judul' => $data['judul'],
                'slug' => $this->uniqueSlug($data['judul']),
                'deskripsi' => $data['deskripsi'],
                'thumbnail' => $thumbnail,
                'status' => $data['status'],
                'harga' => $data['tipe'] === 'premium' ? ($data['harga'] ?? 0) : null,
                'tipe' => $data['tipe'],
                'link_drive' => $data['link_drive'] ?? null,
                'link_github' => $data['link_github'] ?? null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $this->storeGallery($idProduk, $request->file('gambar') ?: []);

            DB::commit();

            toastr()->success('Produk berhasil ditambahkan!', ['timeOut' => 5000]);

            return redirect()->route('produk.index');
        } catch (\Throwable $e) {
            DB::rollBack();
            $this->deleteImage($thumbnail, self::THUMBNAIL_PATH);

            toastr()->error($e->getMessage(), ['timeOut' => 5000]);

            return back()->withInput();
        }
    }

    public function edit($id)
    {
        $produk = $this->findOwnedProduk($id);
        $kategoris = DB::table('m_kategori')->orderBy('name')->get();
        $galeri = DB::table('tbl_produk_gambar')->where('id_produk', $produk->id)->orderBy('urutan')->orderBy('id')->get();
        $developers = $this->developers();

        return view('produk.edit', compact('produk', 'kategoris', 'galeri', 'developers'));
    }

    public function update(Request $request, $id)
    {
        $produk = $this->findOwnedProduk($id);
        $data = $this->validateProduk($request);
        $idUser = $this->resolveOwner($request, $produk);
        $thumbnail = null;

        try {
            DB::beginTransaction();

            if ($request->hasFile('thumbnail')) {
                $thumbnail = $this->storeImage($request->file('thumbnail'), self::THUMBNAIL_PATH);
            }

            DB::table('tbl_produk')->where('id', $produk->id)->update([
                'id_user' => $idUser,
                'id_kategori' => $data['id_kategori'] ?? null,
                'judul' => $data['judul'],
                'slug' => $this->uniqueSlug($data['judul'], $produk->id),
                'deskripsi' => $data['deskripsi'],
                'thumbnail' => $thumbnail ?: $produk->thumbnail,
                'status' => $data['status'],
                'harga' => $data['tipe'] === 'premium' ? ($data['harga'] ?? 0) : null,
                'tipe' => $data['tipe'],
                'link_drive' => $data['link_drive'] ?? null,
                'link_github' => $data['link_github'] ?? null,
                'updated_at' => now(),
            ]);

            $this->storeGallery($produk->id, $request->file('gambar') ?: []);

            DB::commit();

            if ($thumbnail) {
                $this->deleteImage($produk->thumbnail, self::THUMBNAIL_PATH);
            }

            toastr()->success('Produk berhasil diperbarui!', ['timeOut' => 5000]);

            return redirect()->route('produk.index');
        } catch (\Throwable $e) {
            DB::rollBack();
            $this->deleteImage($thumbnail, self::THUMBNAIL_PATH);

            toastr()->error($e->getMessage(), ['timeOut' => 5000]);

            return back()->withInput();
        }
    }

    public function destroy($id)
    {
        $produk = $this->findOwnedProduk($id);

        DB::table('tbl_produk')->where('id', $produk->id)->update([
            'id_hapus' => now(),
            'updated_at' => now(),
        ]);

        return response()->json(['status' => 'success']);
    }

    public function destroyGambar($id)
    {
        $gambar = DB::table('tbl_produk_gambar')->where('id', $id)->first();

        if (! $gambar) {
            abort(404);
        }

        $this->findOwnedProduk($gambar->id_produk);

        DB::table('tbl_produk_gambar')->where('id', $gambar->id)->delete();
        $this->deleteImage($gambar->path, self::GALLERY_PATH);

        return response()->json(['status' => 'success']);
    }

    public function urutanGambar(Request $request)
    {
        $data = $request->validate([
            'urutan' => 'required|array',
            'urutan.*' => 'integer',
        ]);

        $gambar = DB::table('tbl_produk_gambar')->whereIn('id', $data['urutan'])->get();

        if ($gambar->count() !== count($data['urutan']) || $gambar->pluck('id_produk')->unique()->count() !== 1) {
            abort(422);
        }

        $this->findOwnedProduk($gambar->first()->id_produk);

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

    private function validateProduk(Request $request): array
    {
        return $request->validate([
            'judul' => 'required|string|max:255',
            'id_kategori' => 'nullable|exists:m_kategori,id',
            'deskripsi' => 'required|string',
            'tipe' => 'required|in:gratis,premium',
            'harga' => 'nullable|required_if:tipe,premium|numeric|min:0',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'gambar' => 'nullable|array',
            'gambar.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
            'link_github' => 'nullable|required_if:tipe,gratis|url|max:255',
            'link_drive' => 'nullable|required_if:tipe,premium|url|max:255',
            'status' => 'required|in:Y,T',
            'id_user' => 'nullable|exists:users,id',
        ]);
    }

    private function resolveOwner(Request $request, ?object $produk = null): int
    {
        if (! $this->isAdminUtama()) {
            return (int) ($produk->id_user ?? Auth::id());
        }

        if ($request->filled('id_user')) {
            $developer = User::role('admin')->where('id', $request->id_user)->first();

            if (! $developer) {
                throw ValidationException::withMessages([
                    'id_user' => 'Developer yang dipilih tidak valid.',
                ]);
            }

            return (int) $developer->id;
        }

        return (int) Auth::id();
    }

    private function findOwnedProduk($id): object
    {
        $produk = DB::table('tbl_produk')->where('id', $id)->whereNull('id_hapus')->first();

        if (! $produk) {
            abort(404);
        }

        if (! $this->isAdminUtama() && (int) $produk->id_user !== (int) Auth::id()) {
            abort(403);
        }

        return $produk;
    }

    private function uniqueSlug(string $judul, ?int $ignoreId = null): string
    {
        $base = Str::slug($judul) ?: 'produk';
        $slug = $base;
        $counter = 2;

        while (DB::table('tbl_produk')
            ->where('slug', $slug)
            ->when($ignoreId, function ($query) use ($ignoreId) {
                $query->where('id', '!=', $ignoreId);
            })
            ->exists()) {
            $slug = $base.'-'.$counter;
            $counter++;
        }

        return $slug;
    }

    private function storeImage($file, string $directory): string
    {
        $destination = public_path($directory);

        if (! File::isDirectory($destination)) {
            File::makeDirectory($destination, 0755, true);
        }

        $extension = strtolower($file->extension() ?: $file->getClientOriginalExtension());
        $name = now()->format('YmdHis').'_'.Str::random(8).'.'.$extension;
        $file->move($destination, $name);

        return $name;
    }

    private function deleteImage(?string $name, string $directory): void
    {
        if (! $name) {
            return;
        }

        $path = public_path($directory.'/'.$name);

        if (File::exists($path)) {
            File::delete($path);
        }
    }

    private function storeGallery(int $idProduk, array $files): void
    {
        $urutan = (int) DB::table('tbl_produk_gambar')->where('id_produk', $idProduk)->max('urutan');

        foreach ($files as $file) {
            if (! $file) {
                continue;
            }

            DB::table('tbl_produk_gambar')->insert([
                'id_produk' => $idProduk,
                'path' => $this->storeImage($file, self::GALLERY_PATH),
                'urutan' => ++$urutan,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function developers()
    {
        if (! $this->isAdminUtama()) {
            return collect();
        }

        return User::role('admin')->orderBy('name')->get();
    }

    private function isAdminUtama(): bool
    {
        return Auth::check() && (int) Auth::id() === 1;
    }
}
