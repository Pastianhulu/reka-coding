<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    // Class Publik
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
    // End

    Route::get('/rekac', function () {
        $run = Artisan::call('config:clear');
        $run = Artisan::call('cache:clear');
        $run = Artisan::call('view:clear');
        $run = Artisan::call('config:cache');
        $run = Artisan::call('route:clear');
        $run = Artisan::call('optimize:clear');

        return 'Halaman Berhasil di optimize';
    });

    Route::get('/logout', 'Auth\LoginController@logout');

    Auth::routes();

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/home', 'HomeController@index');
        // Admin
        Route::group(['middleware' => 'role:admin', 'prefix' => 'admin'], function () {
            Route::get('/dashboard', 'Dashboard\Dashboard@index')->name('admin.dashboard');
            Route::get('/produk', 'Produk\Produk@index');
            Route::get('/kategori', 'Master\KategoriController@index');
            Route::get('/blog', 'Blog\Blog@index');
            Route::get('/pesanan', 'Pesanan\Pesanan@index');
            Route::get('/membership', 'Membership\Membership@index');

            // MANAJEMEN USER
            Route::resource('/permission',  'User\PermissionController');
            Route::resource('/role',        'User\RoleController');
            Route::resource('/user',        'User\UserController');
        });

        // Member
        Route::group(['middleware' => 'role:member', 'prefix' => 'member'], function () {
            Route::get('/dashboard', 'Member\DashboardController@index')->name('member.dashboard');
        });
    });
});
