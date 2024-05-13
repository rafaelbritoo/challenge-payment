<?php

namespace App\Http\Controllers;

use App\Services\TransferService;
use GuzzleHttp\Psr7\Request;
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
        $this->transferService->handle($request->toDTO());
        return response()->noContent();
    }

    public function transferencia(
        Request $request
    )
    {
        return $request;
    }
}
