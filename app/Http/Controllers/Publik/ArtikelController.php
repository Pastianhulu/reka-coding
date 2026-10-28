<?php

namespace App\Http\Controllers\Publik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArtikelController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('tbl_artikel')
            ->leftJoin('users', 'users.id', '=', 'tbl_artikel.id_user')
            ->leftJoin('m_kategori', 'm_kategori.id', '=', 'tbl_artikel.id_kategori')
            ->select('tbl_artikel.*', 'users.name as penulis', 'm_kategori.name as kategori_name')
            ->whereNull('tbl_artikel.id_hapus')
            ->where('tbl_artikel.status', 'Y');

        if ($request->filled('id_kategori')) {
            $query->where('tbl_artikel.id_kategori', $request->id_kategori);
        }

        if ($request->filled('cari')) {
            $query->where('tbl_artikel.judul', 'like', '%'.$request->cari.'%');
        }

        $artikels = $query->orderByDesc('tbl_artikel.id')->paginate(9)->withQueryString();
        $kategoris = DB::table('m_kategori')->orderBy('name')->get();

        return view('publik.artikel', compact('artikels', 'kategoris'));
    }

    public function show($slug)
    {
        $artikel = DB::table('tbl_artikel')
            ->leftJoin('users', 'users.id', '=', 'tbl_artikel.id_user')
            ->leftJoin('m_kategori', 'm_kategori.id', '=', 'tbl_artikel.id_kategori')
            ->select('tbl_artikel.*', 'users.name as penulis', 'm_kategori.name as kategori_name')
            ->where('tbl_artikel.slug', $slug)
            ->whereNull('tbl_artikel.id_hapus')
            ->where('tbl_artikel.status', 'Y')
            ->first();

        if (! $artikel) {
            abort(404);
        }

        $terbaru = DB::table('tbl_artikel')
            ->whereNull('id_hapus')
            ->where('status', 'Y')
            ->where('id', '!=', $artikel->id)
            ->orderByDesc('id')
            ->limit(5)
            ->get(['judul', 'slug']);

        return view('publik.artikel-detail', compact('artikel', 'terbaru'));
    }
}