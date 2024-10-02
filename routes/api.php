<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClientController;
use App\Http\Middleware\TimeMiddleware;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/clients', [ClientController::class, 'index'])->middleware(TimeMiddleware::class);