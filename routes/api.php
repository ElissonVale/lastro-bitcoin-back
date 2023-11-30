<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\KeyGenController as KeyGen;
use App\Http\Controllers\ApiKeyAuthenticateController;

use App\Http\Middleware\ApiAuthenticateMiddleware;
use App\Http\Middleware\UserAuthenticateMiddleware;


Route::middleware([ApiAuthenticateMiddleware::class])->group(function () {
    // Routes authenticated api-key

    Route::post('/generate-keys', [KeyGen::class, 'generatePairKey']);

    Route::post('/recover-keys', [KeyGen::class, 'recoverPairKeys']);

    Route::post('/users/new', [UserController::class, 'create']);

    Route::post('/users/exist', [UserController::class, 'existUser']);

    Route::post('/users/validate-name', [UserController::class, 'validateName']);

    Route::post('/users/list', [UserController::class, 'list']);

    Route::post('/users/delete-all', [UserController::class, 'deleteAll']);
});

Route::middleware([UserAuthenticateMiddleware::class])->group(function () {
    // Routes authenticated user key Authorization

    Route::post('/users/delete', [UserController::class, 'delete']);

    Route::post('/users/search', [UserController::class, 'search']);

    Route::post('/transactions/list', [TransactionController::class, 'listTransactions']);
});


Route::post('/authenticate/generate-key', [ApiKeyAuthenticateController::class, 'generate']);

Route::post('/authenticate/list-keys', [ApiKeyAuthenticateController::class, 'list']);

Route::post('/tests', function () {
    $date = date('Y-m-d H:i:s', time());
    dd($date);
});


