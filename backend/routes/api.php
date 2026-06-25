<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\InsightController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DangerLevelController;

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/user', function (Request $request) {
        return Auth::check() ? response()->json(['id' => Auth::user()->id, 'name' => Auth::user()->name]) : false;
    });

    Route::controller(UserController::class)->group(function () {
        Route::post('/users/search', 'search');
        Route::get('/users/{id}', 'getbyid');
        Route::post('/users', 'insert');
        Route::put('/users/{id}', 'update');
        Route::delete('/users/{id}', 'delete');
    });

    Route::controller(InsightController::class)->group(function () {
        Route::get('/insights/reportcountbymonth', 'reportcountbymonth');
    });

    Route::controller(ReportController::class)->group(function () {
        Route::post('/reports/search', 'search');
        Route::get('/reports/{id}', 'getbyid');
        Route::post('/reports', 'insert');
        Route::put('/reports/{id}', 'update');
        Route::delete('/reports/{id}', 'delete');
    });

    Route::controller(CityController::class)->group(function () {
        Route::post('/cities/search', 'search');
        Route::get('/cities/{id}', 'getbyid');
        Route::post('/cities', 'insert');
        Route::put('/cities/{id}', 'update');
        Route::delete('/cities/{id}', 'delete');
    });

    Route::controller(CountryController::class)->group(function () {
        Route::post('/countries/search', 'search');
        Route::get('/countries/{id}', 'getbyid');
        Route::post('/countries', 'insert');
        Route::put('/countries/{id}', 'update');
        Route::delete('/countries/{id}', 'delete');
    });

    Route::controller(DangerLevelController::class)->group(function () {
        Route::post('/dangerlevels/search', 'search');
        Route::get('/dangerlevels/{id}', 'getbyid');
        Route::post('/dangerlevels', 'insert');
        Route::put('/dangerlevels/{id}', 'update');
        Route::delete('/dangerlevels/{id}', 'delete');
    });
});
