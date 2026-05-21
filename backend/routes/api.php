<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;

use App\Models\User;
use App\Models\Report;

use App\Http\Resources\UserResource;
use App\Http\Resources\ReportResource;

Route::prefix("auth")->group(function () {
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware(['auth:sanctum'])->get('/user', [AuthController::class, 'user']);
});