<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Service;
use App\Models\Portfolio;

use App\Observers\ServiceObserver;
use App\Observers\PortfolioObserver;

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
        Service::observe(ServiceObserver::class);
        Portfolio::observe(PortfolioObserver::class);
    }
}