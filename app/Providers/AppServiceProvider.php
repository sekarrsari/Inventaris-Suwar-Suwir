<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Penjualan;
use App\Policies\PenjualanPolicy;

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
        //
    }
}
