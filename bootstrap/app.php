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
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // ESTO ES LO QUE TIENES QUE AÑADIR:
        $middleware->trustProxies(at: '*');
        
        // Opcional: Si quieres asegurar que Laravel siempre genere enlaces HTTPS
        // $middleware->alias(['https' => \App\Http\Middleware\TrustProxies::class]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();