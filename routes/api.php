<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CityController;

Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'all');
        Route::post('/users', 'insert');
        Route::put('/users/{id}', 'update');
        Route::delete('/users/{id}', 'delete');
    });

    Route::controller(ReportController::class)->group(function () {
        Route::get('/reports', 'all');
        Route::post('/reports', 'insert');
        Route::put('/reports/{id}', 'update');
        Route::delete('/reports/{id}', 'delete');
    });

    Route::controller(CityController::class)->group(function () {
        Route::get('/cities', 'all');
        Route::post('/cities', 'insert');
        Route::put('/cities/{id}', 'update');
        Route::delete('/cities/{id}', 'delete');
    });
});

Route::post('/helper', [UserController::class, 'helper']);

// Route::get('/user', function (Request $request) {
//     return response()->json([
//         Auth::check()
//     ]);
// });