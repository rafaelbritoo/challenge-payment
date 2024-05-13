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
    ): Response
    {
        var_dump('teste');die;
//        $this->transferService->handle($request->toDTO());
//        return response()->noContent();
    }
}
