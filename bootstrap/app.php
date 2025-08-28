<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

ini_set('curl.cainfo', 'C:/laragon/bin/php/php-8.3.16-Win32-vs16-x64/extras/ssl/cacert.pem');
ini_set('openssl.cafile', 'C:/laragon/bin/php/php-8.3.16-Win32-vs16-x64/extras/ssl/cacert.pem');


// ⚠️ لا تحذف أي جزء من هذا القالب
return Application::configure(basePath: dirname(__DIR__))



    // توجيه المسارات
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )

    // aliases للـ Spatie Permission (Middleware بالمفرد)
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
        ]);
    })

    // إعداد الاستثناءات (اتركه فارغًا إن ما عندك تخصيص)
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })

    ->create();
