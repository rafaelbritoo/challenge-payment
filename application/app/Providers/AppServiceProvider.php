<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\TransferService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(\App\Contracts\PaymentGatewayContract::class, TransferService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
