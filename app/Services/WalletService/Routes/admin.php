<?php

use App\Services\WalletService\Controllers\V1\Admin\TransactionController;
use Illuminate\Support\Facades\Route;

Route::middleware(['api', 'auth:api'])->prefix('api/admin/v1')->name('admin.v1.')->group(function () {
    Route::prefix('transactions')->group(function () {
        Route::post('/', [TransactionController::class, 'store']);
        Route::get('/', [TransactionController::class, 'index']);
    });
});
