<?php

namespace App\External;

use App\Contracts\PaymentGatewayContract;
use Illuminate\Support\Facades\Http;

class ExternalGateway implements PaymentGatewayContract
{
    public function getPaymentGatewayName(): string
    {
        return 'external';
    }

    public function authorizePayment(): bool
    {
        $request = Http::get('https://run.mocky.io/v3/5794d450-d2e2-4412-8131-73d0293ac1cc')->json();

        return $request['message'] == 'Succsses';
    }
}
