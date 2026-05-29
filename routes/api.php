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

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/users', [UserController::class, 'all']);

    Route::post('/users', [UserController::class, 'insert']);

    Route::put('/users/{id}', [UserController::class, 'update']);

    Route::delete('/users/{id}', [UserController::class, 'delete']);
});

Route::post('/helper', [UserController::class, 'helper']);