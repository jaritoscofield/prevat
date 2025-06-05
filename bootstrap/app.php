<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
////            Route::middleware(['web'])
////                ->prefix('admin')
////                ->name('admin.')
////                ->group(base_path('routes/admin.php'));
//
            Route::middleware(['web', 'route_admin'])->group(base_path('routes/admin.php'));

            Route::middleware(['web', 'route_client'])->group(base_path('routes/client.php'));

            Route::middleware(['web', 'route_contractor'])->group(base_path('routes/contractor.php'));

            Route::middleware(['web', ''])->group(function () {
                Route::get('/contratos');
                Route::get('/evidencias');
            });
        },

    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => \App\Http\Middleware\CheckAdmin::class,
            'client' => \App\Http\Middleware\CheckClient::class,
            'route_admin' => \App\Http\Middleware\RouteAdmin::class,
            'route_client' => \App\Http\Middleware\RouteClient::class,
            'route_contractor' => \App\Http\Middleware\RouteContractor::class,
            'contract_default' => \App\Http\Middleware\CheckDefaultContract::class

        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

