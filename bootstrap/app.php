<?php

use App\Http\Middleware\PelamarAuth;
use App\Http\Middleware\PelamarDiterima;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //

        $middleware->alias([
            'role'             => RoleMiddleware::class,
            'pelamar.auth'     => PelamarAuth::class,
            'pelamar.diterima' => PelamarDiterima::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
        $exceptions->render(function (\Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException $e) {
            return response()->view('errors.403', [
                'message' => $e->getMessage() ?: 'Anda tidak memiliki akses.',
            ], 403);
        });
    })->create();
