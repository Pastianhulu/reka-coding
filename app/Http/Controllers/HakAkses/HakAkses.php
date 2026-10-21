<?php

namespace App\Http\Controllers\HakAkses;

use App\Http\Controllers\Controller;

class HakAkses extends Controller
{
    public function index()
    {
        return view('admin.placeholder', ['title' => 'Hak Akses / Permission']);
    }
}
