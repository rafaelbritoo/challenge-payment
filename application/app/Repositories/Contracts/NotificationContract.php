<?php

namespace App\Repositories\Contracts;

interface NotificationContract
{
    public function getProviderName();
    public function sendPaymentApproval(): bool;
}
