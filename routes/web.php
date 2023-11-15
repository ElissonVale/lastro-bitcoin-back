<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::get('/welcome', function () {
    return view('welcome');
});

Route::get("/", [HomeController::class, 'index']);
