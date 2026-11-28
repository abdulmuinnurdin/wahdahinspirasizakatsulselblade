<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\MasterData\CountryController;
use App\Http\Middleware\EnforceJsonApi;
use Illuminate\Support\Facades\Route;

Route::middleware(EnforceJsonApi::class)
    ->prefix('v1')
    ->group(function () {
        Route::post('/auth/login', [AuthController::class, 'login']);

        Route::middleware('auth:sanctum')->group(function () {
            Route::get('/auth/me', [AuthController::class, 'me']);
            Route::delete('/auth/logout', [AuthController::class, 'logout']);
            Route::get('/countries', [CountryController::class, 'index']);
            Route::post('/countries', [CountryController::class, 'store']);
            Route::get('/countries/{country}', [CountryController::class, 'show']);
            Route::patch('/countries/{country}', [CountryController::class, 'update']);
            Route::post('/countries/{country}/activate', [CountryController::class, 'activate']);
            Route::post('/countries/{country}/deactivate', [CountryController::class, 'deactivate']);
        });
    });
