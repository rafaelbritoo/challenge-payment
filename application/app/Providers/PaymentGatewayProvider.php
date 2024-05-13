<?php

namespace App\Providers;

use App\Contracts\PaymentGatwayContract;
use App\External\ExternalGateway;
use Illuminate\Support\ServiceProvider;
use App\Exceptions\PaymentGatewayException;

class PaymentGatewayServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app->bind(PaymentGatwayContract::class, function ($app) {
            return match ($app['config']['payments.default_provider']) {
                'external' => new ExternalGateway(),
                default => throw PaymentGatewayException::notImplemented(),
            };
        });
    }
}
