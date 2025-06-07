<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // 1. Daftarkan alias seperti biasa. Ini sudah benar.
        $middleware->alias([
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
        ]);

        // 2. Modifikasi prioritas. Ini adalah cara yang benar dan paling aman.
        // Kita tidak menggunakan prependToGroup karena itu akan menjalankan middleware
        // secara global dan menyebabkan error "Too few arguments".
        // Kita hanya perlu mengatur urutan eksekusinya saja.
        $middleware->priority([
            \Illuminate\Foundation\Http\Middleware\HandlePrecognitiveRequests::class,
            \Illuminate\Cookie\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class,
            
            // Menurut dokumentasi Spatie, middleware otorisasi
            // harus dijalankan sebelum 'SubstituteBindings'.
            // Middleware 'can:' dari Laravel adalah alias untuk 'Authorize'.
            \Illuminate\Auth\Middleware\Authorize::class,
            
            // \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            \Illuminate\Routing\Middleware\ThrottleRequests::class,
            \Illuminate\Routing\Middleware\ThrottleRequestsWithRedis::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \Illuminate\Contracts\Auth\Middleware\AuthenticatesRequests::class, // Ini bisa jadi alias dari \Illuminate\Auth\Middleware\Authenticate::class
        ]);
    })
    
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
