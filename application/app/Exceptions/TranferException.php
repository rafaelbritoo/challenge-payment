<?php

namespace App\Exceptions;

use App\Contracts\PaymentGatewayContract;
use Exception;
use App\Contracts\NotificationContract;

class TransferException extends Exception
{
    public static function customerNotAllowedToPay(): self
    {
        return new self("Customer isn't allowed to pay now.");
    }

    public static function outOfPocket(): self
    {
        return new self("No has amount on wallet, try next time");
    }

    public static function notAuthorizedByGateway(PaymentGatewayContract $gateway): self
    {
        return new self(sprintf('Payment not authorized by %s. Rollback this transfer.', $gateway->getPaymentGatewayName()));
    }

    public static function paymentMessageNotSent(NotificationContract $notification): self
    {
        return new self(sprintf('Message not sent by %s.', $notification->getProviderName()));
    }
}
