<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('public.home');
});
Route::get('/produk', function () {
    return view('public.produk');
});
Route::get('/blog', function () {
    return view('public.blog');
});
Route::get('/layanan', function () {
    return view('public.layanan');
});
Route::get('/faq', function () {
    return view('public.faq');
});
Route::get('/contact', function () {
    return view('public.contact');
});

Route::get('/produk-detail', function () {
    return view('public.produk-detail');
});

Route::get('/rekac', function() {
        $run = Artisan::call('config:clear');
        $run = Artisan::call('cache:clear');
        $run = Artisan::call('view:clear');
        $run = Artisan::call('config:cache');
        $run = Artisan::call('route:clear');
        $run = Artisan::call('optimize:clear');
        return 'Halaman Berhasil di optimize';  
    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
