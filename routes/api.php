<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::post('/login', [AuthController::class, 'login']);

// Route::get('/user', function (Request $request) {
//     return response()->json([
//         Auth::check()
//     ]);
// });

Route::get('/users', [UserController::class, 'all'])->middleware('auth:sanctum');

Route::post('/users', [UserController::class, 'insert'])->middleware('auth:sanctum');

Route::put('/users/{id}', [UserController::class, 'update'])->middleware('auth:sanctum');

Route::delete('/users/{id}', [UserController::class, 'delete'])->middleware('auth:sanctum');

Route::post('/helper', [UserController::class, 'helper']);