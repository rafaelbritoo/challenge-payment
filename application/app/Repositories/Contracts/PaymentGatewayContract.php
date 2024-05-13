<?php

namespace App\Repositories\Contracts;

interface PaymentGatewayContract
{
    public function getPaymentGatewayName(): string;
    public function authorizePayment(): bool;
}
