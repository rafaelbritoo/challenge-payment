<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
use App\Contracts\NotificationContract;

class SendInformation implements NotificationContract
{
    public function sendPaymentApproval(): bool
    {
        $request = Http::get('https://run.mocky.io/v3/54dc2cf1-3add-45b5-b5a9-6bf7e7f1f4a6')
            ->json();

        return $request['message'] === true;
    }

    public function getProviderName(): string
    {
        return 'sendinformation';
    }
}
