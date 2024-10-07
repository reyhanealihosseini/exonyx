<?php

use App\Services\AuthenticationService\Controllers\V1\AuthenticationController;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->prefix('api/v1')->name('client.')->group(function () {

    Route::prefix('auth')->name('auth.')->group(function () {

        Route::post('check', [AuthenticationController::class, 'check'])->name('check');
        Route::post('verify', [AuthenticationController::class, 'verify'])->name('verify');

        Route::middleware('auth')->group(function () {
            Route::delete('logout', [AuthenticationController::class, 'logout'])->name('logout');
        });

    });
});
