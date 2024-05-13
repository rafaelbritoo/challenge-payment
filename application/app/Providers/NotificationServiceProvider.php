<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\NotificationContract;
use App\Exceptions\NotificationException;

class NotificationServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app->bind(NotificationContract::class, function ($app) {
            return match ($app['config']['payments.default_notification']) {
                'sendinformation' => new SendInformation(),
                default => NotificationException::providerNotIsFound(),
            };
        });
    }
}
