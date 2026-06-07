<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/user', function (Request $request) {
    return ['user' => $request->user()];
})->middleware('auth:sanctum');

// Route::post('/helper', [UserController::class, 'helper']);
