<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator; // Tambahkan ini
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate; // Tambahkan ini
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
        Paginator::useTailwind();

        Gate::define('admin', function ($user) {
            return $user->is_admin == true;
        });

        // Tambahkan lokasi views secara eksplisit (Opsional)
        View::addLocation(resource_path('views'));
    }
}