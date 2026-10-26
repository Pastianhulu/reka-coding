<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PembelianController extends Controller
{
    public function index()
    {
        $pembelians = DB::table('pembelian')
            ->join('tbl_produk', 'tbl_produk.id', '=', 'pembelian.id_produk')
            ->where('pembelian.id_user', Auth::id())
            ->select('pembelian.*', 'tbl_produk.judul', 'tbl_produk.slug', 'tbl_produk.harga')
            ->orderByDesc('pembelian.id')
            ->get();

        $produkGratis = DB::table('tbl_produk')
            ->where('tipe', 'gratis')
            ->where('status', 'Y')
            ->whereNull('id_hapus')
            ->orderByDesc('id')
            ->get();

        $caraBayars = DB::table('m_cara_bayar')->where('status', 1)->orderBy('name')->get();
        $profil = DB::table('m_profil')->first();

        return view('member.produk-saya', compact('pembelians', 'produkGratis', 'caraBayars', 'profil'));
    }

    public function store($id_produk)
    {
        $produk = DB::table('tbl_produk')
            ->where('id', $id_produk)
            ->where('tipe', 'premium')
            ->whereNull('id_hapus')
            ->where('status', 'Y')
            ->first();

        if (! $produk) {
            abort(404);
        }

        $existing = DB::table('pembelian')
            ->where('id_user', Auth::id())
            ->where('id_produk', $produk->id)
            ->first();

        if ($existing && $existing->status === 'lunas') {
            return redirect()->route('member.produk-saya')->with('info', 'Produk ini sudah lunas.');
        }

        if (! $existing) {
            DB::table('pembelian')->insert([
                'id_user' => Auth::id(),
                'id_produk' => $produk->id,
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('member.produk-saya')->with('success', 'Pesanan dibuat. Silakan transfer sesuai harga produk, lalu konfirmasi ke admin.');
    }
}
