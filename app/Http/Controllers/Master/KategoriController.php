<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;

class KategoriController extends Controller
{
    public function index()
    {
        return view('admin.master.kategori.index');
    }
}
