<?php

namespace App\Http\Controllers\Publik;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LayananController extends Controller
{
    public function index()
    {
        $layanans = DB::table('tbl_layanan')
            ->whereNull('id_hapus')->where('status', 'Y')->orderBy('urutan')->get()
            ->map(function ($item) {
                $item->fitur_list = array_values(array_filter(array_map('trim', explode("\n", (string) $item->fitur))));
                $item->nomor = str_pad((string) ($item->urutan ?: $loop ?? 0), 2, '0', STR_PAD_LEFT);
                return $item;
            });

        return view('publik.layanan', compact('layanans'));
    }
}