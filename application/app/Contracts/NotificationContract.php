<?php

namespace App\Contracts;

interface NotificationContract
{
    public function getProviderName();
    public function sendPaymentApproval(): bool;
}
