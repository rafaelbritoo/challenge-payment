<?php

namespace App\DTO;

readonly class TransferDTO
{
    public function __construct(
        public string $payerId,
        public string $payeeId,
        public int    $amount
    )
    {
    }
}
