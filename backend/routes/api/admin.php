<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\User;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AuthController;

use App\Http\Resources\UserResource;

// ------------------ USERS ------------------

Route::get('/user', [AuthController::class, 'user']);

Route::get('/user/{id}', function ($id) {
    return new UserResource(User::findOrFail($id));
});

Route::get('/users', function () {
    return UserResource::collection(User::all());
});

Route::put('/user/{id}', [UserController::class, 'update']);

Route::delete('/user/{id}', [UserController::class, 'destroy']);

Route::post('/user', [UserController::class, 'store']);

// ------------------ REPORTS ------------------

Route::put('/report/{id}', [ReportController::class, 'update']);

Route::delete('/report/{id}', [ReportController::class, 'destroy']);

Route::post('/report', [ReportController::class, 'store']);