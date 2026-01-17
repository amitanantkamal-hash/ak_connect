<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php', //added by amit pawar
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->api(prepend: [
            'tenant' => \App\Http\Middleware\ResolveTenant::class, //added by amit pawar
            'admin'  => \App\Http\Middleware\EnsureAdmin::class, //added by amit pawar
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
