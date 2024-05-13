<?php

namespace App\Repositories;

use App\DTO\TransferDTO;
use App\Enum\TransferStatusEnum;
use App\Models\Transfer;

class TransferRepository
{
    public function startTransfer(TransferDTO $payload): Transfer
    {
        return Transfer::query()->create([
            'payer_id' => $payload->payerId,
            'payee_id' => $payload->payeeId,
            'amount' => $payload->amount,
            'status' => TransferStatusEnum::Accepted,
        ]);
    }

    public function updateTransferStatus(string $transferId, TransferStatusEnum $status)
    {
        return Transfer::query()->find($$transferId)->update([
            'status' => $status
        ]);
    }
}
