<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

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
        Model::preventLazyLoading(!app()->isProduction()); //mencegah lazy loading di lingkungan non-produksi untuk membantu mengidentifikasi potensi masalah performa dengan memaksa eager loading pada relasi model.
    }
}
