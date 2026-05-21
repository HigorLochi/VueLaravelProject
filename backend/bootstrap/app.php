<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        api: __DIR__.'/../routes/api.php',
        health: '/up',
        // then: function () {
        //     Route::prefix('api')
        //     ->group(function () {
        //         Route::prefix('user')
        //             ->group([
        //                 __DIR__ . '/../routes/api/user.php'
        //             ]);
        //         Route::middleware('auth:sanctum')
        //             ->prefix('admin')
        //             ->group([
        //                 __DIR__ . '/../routes/api/admin.php',
        //             ]);
        //     });
        // }
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'authenticate' => \App\Http\Middleware\Authenticate::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
