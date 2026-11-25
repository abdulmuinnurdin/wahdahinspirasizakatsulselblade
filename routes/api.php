<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Middleware\EnforceJsonApi;
use Illuminate\Support\Facades\Route;

Route::middleware(EnforceJsonApi::class)
    ->prefix('v1')
    ->group(function () {
        Route::post('/auth/login', [AuthController::class, 'login']);

        Route::middleware('auth:sanctum')->group(function () {
            Route::get('/auth/me', [AuthController::class, 'me']);
            Route::delete('/auth/logout', [AuthController::class, 'logout']);
        });
    });
