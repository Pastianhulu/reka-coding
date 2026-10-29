<?php

namespace App\Http\Controllers\Publik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // 1. Layanan (Tampilkan 3 urutan teratas)
        $layanan = DB::table('tbl_layanan')
            ->whereNull('id_hapus')
            ->where('status', 'Y')
            ->orderBy('urutan')
            ->limit(3)
            ->get();
        
        // 2. Artikel / Blog Terbaru
        $artikel = DB::table('tbl_artikel')
            ->leftJoin('users', 'tbl_artikel.id_user', '=', 'users.id')
            ->leftJoin('m_kategori', 'm_kategori.id', '=', 'tbl_artikel.id_kategori')
            ->select(
                'tbl_artikel.*',
                'users.name as developer',
                'm_kategori.name as kategori'
            )
            ->whereNull('tbl_artikel.id_hapus')
            ->where('tbl_artikel.status', 'Y')
            ->orderByDesc('tbl_artikel.created_at')
            ->limit(6)
            ->get();
        
        // 3. Produk / Source Code Terbaru
        $produk = DB::table('tbl_produk')
            ->leftJoin('users', 'tbl_produk.id_user', '=', 'users.id')
            ->leftJoin('m_kategori', 'm_kategori.id', '=', 'tbl_produk.id_kategori')
            ->select(
                'tbl_produk.*',
                'users.name as developer',
                'm_kategori.name as kategori'
            )
            ->whereNull('tbl_produk.id_hapus')
            ->where('tbl_produk.status', 'Y')
            ->orderByDesc('tbl_produk.created_at')
            ->limit(6)
            ->get();
        
        // Kirim semua data ke View
        return view('publik.home', compact('layanan', 'artikel', 'produk'));
    }
}