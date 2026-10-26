<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    public function download($slug)
    {
        $user = Auth::user();

        $produk = DB::table('tbl_produk')
            ->where('slug', $slug)
            ->whereNull('id_hapus')
            ->where('status', 'Y')
            ->first();

        if (! $produk) {
            abort(404);
        }

        if ($produk->tipe === 'gratis') {
            if (! $produk->link_github) {
                abort(404);
            }

            return redirect()->away($produk->link_github);
        }

        $membershipAktif = $user->membership_until && $user->membership_until->gte(now());
        $sudahBeli = DB::table('pembelian')
            ->where('id_user', $user->id)
            ->where('id_produk', $produk->id)
            ->where('status', 'lunas')
            ->exists();

        if (! $membershipAktif && ! $sudahBeli) {
            return redirect()->route('member.upgrade')->with('info', 'Produk ini membutuhkan membership aktif atau pembelian.');
        }

        if (! $produk->link_drive) {
            abort(404);
        }

        return redirect()->away($produk->link_drive);
    }
}
