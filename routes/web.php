<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers'], function () {

    // Publik
    Route::get('/', 'Publik\HomeController@index');
    Route::get('/produk', 'Publik\ProdukController@index');
    Route::get('/produk/{slug}', 'Publik\ProdukController@show');
    Route::get('/blog', 'Publik\ArtikelController@index');
    Route::get('/blog/{slug}', 'Publik\ArtikelController@show');
    Route::get('/layanan', 'Publik\LayananController@index');

    Route::view('/faq', 'publik.faq');
    Route::view('/contact', 'publik.contact');
    Route::redirect('/produk-detail', '/produk');

    Route::get('/rekac', function () {
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        Artisan::call('config:cache');
        Artisan::call('route:clear');
        Artisan::call('optimize:clear');

        return 'Halaman Berhasil di optimize';
    });

    Auth::routes();

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/produk/{slug}/download', 'Member\ProdukController@download');

        Route::group(['middleware' => 'role:admin', 'prefix' => 'admin'], function () {
            Route::get('/dashboard', 'Dashboard\Dashboard@index');
            Route::get('/blog', 'Blog\Blog@index');
            Route::get('/pesanan', 'Pesanan\Pesanan@index');

            // Produk
            Route::get('/produk', 'Produk\ProdukController@index');
            Route::get('/produk/create', 'Produk\ProdukController@create');
            Route::post('/produk', 'Produk\ProdukController@store');
            Route::post('/produk/gambar/urutan', 'Produk\ProdukController@urutanGambar');
            Route::delete('/produk/gambar/{id}', 'Produk\ProdukController@destroyGambar');
            Route::get('/produk/{id}/edit', 'Produk\ProdukController@edit');
            Route::put('/produk/{id}', 'Produk\ProdukController@update');
            Route::delete('/produk/{id}', 'Produk\ProdukController@destroy');

            // Pembelian
            Route::get('/pembelian', 'Pembelian\PembelianController@index');
            Route::put('/pembelian/{id}/lunas', 'Pembelian\PembelianController@lunas');

            // Data Master
            Route::resource('kategori', 'Master\KategoriController');
            Route::resource('cara-bayar', 'Master\CaraBayarController');
            Route::resource('profil', 'Master\ProfilController');

            // Manajemen User
            Route::resource('permission', 'User\PermissionController');
            Route::resource('role', 'User\RoleController');
            Route::resource('user', 'User\UserController');

            // Artikel & Layanan
            Route::resource('artikel', 'Artikel\ArtikelController');
            Route::resource('layanan', 'Layanan\LayananController');
        });

        // Member
        Route::group(['middleware' => 'role:member', 'prefix' => 'member'], function () {
            Route::get('/dashboard', 'Member\DashboardController@index');
            Route::get('/produk-saya', 'Member\PembelianController@index');
            Route::post('/pembelian/{id_produk}', 'Member\PembelianController@store');
            Route::get('/upgrade', 'Member\MembershipController@index');
        });
    });
});