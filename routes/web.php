<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Artisan;

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    // Class Publik
    Route::get('/', function () {
        return view('public.home');
    });
    Route::get('/produk', 'Public\ProdukController@index')->name('public.produk.index');
    Route::get('/produk/{slug}', 'Public\ProdukController@show')->name('public.produk.show');
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
        return redirect()->route('public.produk.index');
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
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/produk/{slug}/download', 'Member\ProdukController@download')->name('member.produk.download');

        Route::group(['middleware' => 'role:admin', 'prefix' => 'admin'], function () {
            Route::get('/dashboard', 'Dashboard\Dashboard@index')->name('admin.dashboard');
            Route::get('/blog', 'Blog\Blog@index');
            Route::get('/pesanan', 'Pesanan\Pesanan@index');

            // Produk
            Route::get('/produk', 'Produk\ProdukController@index')->name('produk.index');
            Route::get('/produk/create', 'Produk\ProdukController@create')->name('produk.create');
            Route::post('/produk', 'Produk\ProdukController@store')->name('produk.store');
            Route::post('/produk/gambar/urutan', 'Produk\ProdukController@urutanGambar')->name('produk.gambar.urutan');
            Route::delete('/produk/gambar/{id}', 'Produk\ProdukController@destroyGambar')->name('produk.gambar.destroy');
            Route::get('/produk/{id}/edit', 'Produk\ProdukController@edit')->name('produk.edit');
            Route::put('/produk/{id}', 'Produk\ProdukController@update')->name('produk.update');
            Route::delete('/produk/{id}', 'Produk\ProdukController@destroy')->name('produk.destroy');
            Route::get('/pembelian', 'Pembelian\PembelianController@index')->name('pembelian.index');
            Route::put('/pembelian/{id}/lunas', 'Pembelian\PembelianController@lunas')->name('pembelian.lunas');

            //Data Master
            Route::resource('/kategori', 'Master\KategoriController');
            Route::resource('/cara-bayar', 'Master\CaraBayarController');
            Route::resource('/profil',   'Master\ProfilController');
            
            // Manajemen user 
            Route::resource('/permission',  'User\PermissionController');
            Route::resource('/role',        'User\RoleController');
            Route::resource('/user',        'User\UserController');
        });

        // Member
        Route::group(['middleware' => 'role:member', 'prefix' => 'member'], function () {
            Route::get('/dashboard', 'Member\DashboardController@index')->name('member.dashboard');
            Route::get('/produk-saya', 'Member\PembelianController@index')->name('member.produk-saya');
            Route::post('/pembelian/{id_produk}', 'Member\PembelianController@store')->name('member.pembelian.store');
            Route::get('/upgrade', 'Member\MembershipController@index')->name('member.upgrade');
        });
    });
});
