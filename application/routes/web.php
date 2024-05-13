<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransferController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/api/transfer')->group(function () {
    Route::post('/', [TransferController::class, 'postTransfer']);
    Route::get('/', function () {
        return 'asdasdasdasda';
    });
});
