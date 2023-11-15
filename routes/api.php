<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\KeyGenController as KeyGen;
use App\Http\Controllers\ApiKeyAuthenticateController;

use App\Http\Middleware\MobileAuthMiddleware;
use App\Http\Middleware\AuthenticateUserMiddleware;


Route::middleware([MobileAuthMiddleware::class])->group(function () {
    // Routes authenticated
    Route::post('/generate-keys', [KeyGen::class, 'generatePairKey']);

    Route::post('/recover-keys', [KeyGen::class, 'recoverPairKeys']);

    Route::post('/users/new', [UserController::class, 'create']);

    Route::post('/users/validate-name', [UserController::class, 'validateName']);

    Route::post('/users/list', [UserController::class, 'list']);
});

Route::middleware([AuthenticateUserMiddleware::class])->group(function () {

    Route::post('/users/delete', [UserController::class, 'delete']);

    Route::post('/users/search', [UserController::class, 'search']);

    Route::post('/transactions/list', [TransactionController::class, 'listTransactions']);
});


Route::post('/authenticate/generate-key', [ApiKeyAuthenticateController::class, 'generate']);

Route::post('/authenticate/list-keys', [ApiKeyAuthenticateController::class, 'list']);


