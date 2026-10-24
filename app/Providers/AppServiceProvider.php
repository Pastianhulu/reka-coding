<?php

namespace App\Providers;
use App\Models\Master\Profil;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFour();

        // setting Profil
        view()->composer('*', function ($view) {
            $view->with('profil', Profil::firstOrNew([]));
        });
    }
}   