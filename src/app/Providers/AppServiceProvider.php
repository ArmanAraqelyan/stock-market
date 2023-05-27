<?php

namespace App\Providers;

use App\Contracts\PkgStoreContract;
use App\Contracts\RapidAPIContract;
use App\Services\PkgStoreService;
use App\Services\RapidAPIService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(RapidAPIContract::class, RapidAPIService::class);
        $this->app->bind(PkgStoreContract::class, PkgStoreService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
