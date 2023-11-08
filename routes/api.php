<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KeyGenController as KeyGen;

use App\Http\Middleware\MobileAuthMiddleware;
use App\Http\Middleware\AuthenticateUserMiddleware;



Route::middleware([MobileAuthMiddleware::class])->group(function () {
    // Routes authenticated
    Route::post('/generate-keys', [KeyGen::class, 'generatePairKey']);
    Route::post('/recover-keys', [KeyGen::class, 'recoverPairKeys']);

    Route::post('/users/new', [UserController::class, 'create']);

    Route::middleware([AuthenticateUserMiddleware::class])->group(function () {

        Route::post('/user/delete', [UserController::class, 'delete']);
        Route::post('/user/list-transactions', [UserController::class, 'listTransactions']);
    });
});

