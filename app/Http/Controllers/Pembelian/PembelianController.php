<?php

namespace App\Http\Controllers\Pembelian;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PembelianController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:Master Produk']);
    }

    public function index()
    {
        $pembelians = DB::table('pembelian')
            ->join('users', 'users.id', '=', 'pembelian.id_user')
            ->join('tbl_produk', 'tbl_produk.id', '=', 'pembelian.id_produk')
            ->select('pembelian.*', 'users.name as user_name', 'users.email', 'tbl_produk.judul', 'tbl_produk.harga')
            ->orderByDesc('pembelian.id')
            ->paginate(20);

        return view('pembelian.index', compact('pembelians'));
    }

    public function lunas($id)
    {
        $updated = DB::table('pembelian')->where('id', $id)->update([
            'status' => 'lunas',
            'updated_at' => now(),
        ]);

        if (! $updated) {
            abort(404);
        }

        toastr()->success('Pembelian berhasil ditandai lunas.', ['timeOut' => 5000]);

        return back();
    }
}
