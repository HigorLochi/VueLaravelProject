<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

use App\Models\Report;
use App\Http\Resources\ReportResource;

Route::post('/login', [AuthController::class, 'login']);

Route::get('/report/{id}', function ($id) {
    return new ReportResource(Report::findOrFail($id));
});

Route::get('/reports', function () {
    return ReportResource::collection(Report::all());
});