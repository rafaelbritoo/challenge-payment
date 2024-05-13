<?php

namespace App\Repositories;

use App\DTO\TransferDTO;
use App\Enum\TransferStatusEnum;
use App\Models\Transfer;
use Illuminate\Database\Eloquent\Collection;

class TransferRepository
{
    public function __construct(protected Transfer $transfer)
    {
    }
    public function startTransfer(TransferDTO $payload): Transfer
    {
        return $this->transfer->create([
            'payer_id' => $payload->payerId,
            'payee_id' => $payload->payeeId,
            'amount' => $payload->amount,
            'status' => TransferStatusEnum::Accepted,
        ]);
    }

    public function updateTransferStatus(string $transferId, TransferStatusEnum $status)
    {
        return $this->transfer->find($transferId)->update([
            'status' => $status
        ]);
    }
}
