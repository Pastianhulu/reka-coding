<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;

class Blog extends Controller
{
    public function index()
    {
        return view('admin.placeholder', ['title' => 'Blog']);
    }
}
