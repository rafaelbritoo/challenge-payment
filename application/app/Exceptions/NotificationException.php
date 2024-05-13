<?php

namespace App\Exceptions;

use Exception;

class NotificationException extends Exception
{
    public static function providerNotIsFound(): self
    {
        return new self('Provider is not found.');
    }
}
