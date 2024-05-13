<?php

namespace App\Exceptions;

use Exception;

class PaymentGatewayException extends Exception
{
    public static function notImplemented(): self
    {
        return new self('Not Implemented');
    }
}
