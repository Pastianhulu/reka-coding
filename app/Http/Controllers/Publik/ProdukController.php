<?php

namespace App\Http\Controllers\Publik;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('tbl_produk')
            ->leftJoin('users', 'users.id', '=', 'tbl_produk.id_user')
            ->leftJoin('m_kategori', 'm_kategori.id', '=', 'tbl_produk.id_kategori')
            ->select('tbl_produk.*', 'users.name as developer_name', 'm_kategori.name as kategori_name')
            ->whereNull('tbl_produk.id_hapus')
            ->where('tbl_produk.status', 'Y');

        if ($request->filled('tipe')) {
            $query->where('tbl_produk.tipe', $request->tipe);
        }

        if ($request->filled('id_kategori')) {
            $query->where('tbl_produk.id_kategori', $request->id_kategori);
        }

        if ($request->filled('cari')) {
            $query->where('tbl_produk.judul', 'like', '%'.$request->cari.'%');
        }

        $produks = $query->orderByDesc('tbl_produk.id')->paginate(9)->withQueryString();
        $kategoris = DB::table('m_kategori')->orderBy('name')->get();

        return view('publik.produk', compact('produks', 'kategoris'));
    }

    public function show($slug)
    {
        $produk = DB::table('tbl_produk')
            ->leftJoin('users', 'users.id', '=', 'tbl_produk.id_user')
            ->leftJoin('m_kategori', 'm_kategori.id', '=', 'tbl_produk.id_kategori')
            ->select('tbl_produk.*', 'users.name as developer_name', 'm_kategori.name as kategori_name')
            ->where('tbl_produk.slug', $slug)
            ->whereNull('tbl_produk.id_hapus')
            ->where('tbl_produk.status', 'Y')
            ->first();

        if (! $produk) {
            abort(404);
        }

        $galeri = DB::table('tbl_produk_gambar')->where('id_produk', $produk->id)->orderBy('urutan')->orderBy('id')->get();
        $user = Auth::user();
        $membershipAktif = $user && $user->membership_until && $user->membership_until->gte(now());
        $sudahBeli = $user && DB::table('pembelian')
            ->where('id_user', $user->id)
            ->where('id_produk', $produk->id)
            ->where('status', 'lunas')
            ->exists();

        $bisaDownload = $produk->tipe === 'gratis' || $membershipAktif || $sudahBeli;
        $hargaMembership = DB::table('m_profil')->value('harga_membership');

        return view('publik.produk-detail', compact('produk', 'galeri', 'membershipAktif', 'sudahBeli', 'bisaDownload', 'hargaMembership'));
    }
}
