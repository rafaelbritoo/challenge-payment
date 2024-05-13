<?php

namespace App\Http\Controllers;

use App\Services\TransferService;
use Illuminate\Http\Response;
use App\Http\Requests\CreateTransferRequest;

class TransferController extends Controller
{
    public function __construct(
        private readonly TransferService $transferService
    )
    {
    }

    public function postTransfer(
        CreateTransferRequest $request
    )
    {
        dd($request);
        $this->transferService->handle($request->toDTO());
        return response()->noContent();
    }
}
