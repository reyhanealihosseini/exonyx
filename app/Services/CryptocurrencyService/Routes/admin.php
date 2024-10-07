<?php

use App\Services\CryptocurrencyService\Controllers\V1\Admin\CryptocurrencyController;
use Illuminate\Support\Facades\Route;

Route::middleware(['api', 'auth:api'])->prefix('api/admin/v1/cryptocurrencies')->name('admin.v1.cryptocurrencies.')->group(function () {

    Route::get('/', [CryptocurrencyController::class, 'index']);
    Route::post('/', [CryptocurrencyController::class, 'store']);
    Route::get('{cryptocurrency}', [CryptocurrencyController::class, 'show']);
    Route::patch('{cryptocurrency}', [CryptocurrencyController::class, 'update']);
    Route::delete('{cryptocurrency}', [CryptocurrencyController::class, 'destroy']);
    Route::post('{cryptocurrency}/drivers', [CryptocurrencyController::class, 'setDrivers']);

});
