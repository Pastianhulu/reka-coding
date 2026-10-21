<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;

class Role extends Controller
{
    public function index()
    {
        return view('admin.placeholder', ['title' => 'Role']);
    }
}
