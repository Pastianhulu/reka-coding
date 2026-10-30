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

    Route::get('/logout', 'Auth\LoginController@logout');
    Auth::routes();

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/produk/{slug}/download', 'Member\ProdukController@download');

        Route::group(['middleware' => 'role:admin', 'prefix' => 'admin'], function () {
            Route::get('/dashboard', 'Dashboard\Dashboard@index')->name('admin.dashboard');
            Route::get('/pesanan', 'Pesanan\Pesanan@index');

            // Produk
            Route::post('/produk/gambar/urutan', 'Produk\ProdukController@urutanGambar');
            Route::delete('/produk/gambar/{id}', 'Produk\ProdukController@destroyGambar');
            Route::resource('produk', 'Produk\ProdukController')->except(['show']);

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

            Route::resource('artikel', 'Artikel\ArtikelController');
            Route::resource('layanan', 'Layanan\LayananController');
        });

        // Member
        Route::group(['middleware' => 'role:member', 'prefix' => 'member'], function () {
            Route::get('/dashboard', 'Member\DashboardController@index')->name('member.dashboard');
            Route::get('/produk-saya', 'Member\PembelianController@index');
            Route::post('/pembelian/{id_produk}', 'Member\PembelianController@store');
            Route::get('/upgrade', 'Member\MembershipController@index');
        });
    });
});