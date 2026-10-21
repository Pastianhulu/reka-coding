<?php

namespace App\Http\Controllers\Membership;

use App\Http\Controllers\Controller;

class Membership extends Controller
{
    public function index()
    {
        return view('admin.placeholder', ['title' => 'Membership']);
    }
}
