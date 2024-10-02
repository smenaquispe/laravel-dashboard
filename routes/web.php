<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Middleware\TimeMiddleware;

Route::get('/', function () {
    return view('welcome', ['name' => 'name']);
});

Route::get('/clients', [ClientController::class, 'showView'])->middleware(TimeMiddleware::class);