<?php

namespace App\Http\Controllers\Pesanan;

use App\Http\Controllers\Controller;

class Pesanan extends Controller
{
    public function index()
    {
        return view('admin.placeholder', ['title' => 'Pesanan']);
    }
}
