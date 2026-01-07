<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

$base = dirname(__DIR__);
foreach ([
    $base.'/storage/framework/sessions',
    $base.'/storage/framework/cache',
    $base.'/storage/framework/views',
    $base.'/bootstrap/cache',
] as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
}
// Ensure session path and fallback to array driver if not writable
$sessionDriver = getenv('SESSION_DRIVER') ?: 'file';
if ($sessionDriver === 'file') {
    $sessionPath = $base.'/storage/framework/sessions';
    @ini_set('session.save_path', $sessionPath);
    if (!is_dir($sessionPath)) {
        @mkdir($sessionPath, 0755, true);
    }
    if (!is_dir($sessionPath) || !is_writable($sessionPath)) {
        putenv('SESSION_DRIVER=array');
        $_ENV['SESSION_DRIVER'] = 'array';
        $_SERVER['SESSION_DRIVER'] = 'array';
    }
}

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
           $middleware->alias([
        'admin' => \App\Http\Middleware\IsAdminMiddleware::class,
    ]);


    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
