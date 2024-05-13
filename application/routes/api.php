<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransferController;

Route::prefix('/transfer')->group(function () {
    Route::post('/', [TransferController::class, 'postTransfer']);
    Route::get('/', function () {
        return 'asdasdasdasda';
    });
});
