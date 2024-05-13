<?php

namespace App\Contracts;

interface PaymentGatewayContract
{
    public function getPaymentGatewayName(): string;
    public function authorizePayment(): bool;
}
