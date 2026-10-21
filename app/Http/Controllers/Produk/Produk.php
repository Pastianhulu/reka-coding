<?php

namespace App\Http\Controllers\Produk;

use App\Http\Controllers\Controller;

class Produk extends Controller
{
    public function index()
    {
        return view('admin.placeholder', ['title' => 'Produk']);
    }
}
