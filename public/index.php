<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
foreach ([
    __DIR__.'/../storage/framework/sessions',
    __DIR__.'/../storage/framework/cache',
    __DIR__.'/../storage/framework/views',
    __DIR__.'/../bootstrap/cache',
] as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
}
$sessionPath = __DIR__.'/../storage/framework/sessions';
@ini_set('session.save_path', $sessionPath);
if (!is_dir($sessionPath) || !is_writable($sessionPath)) {
    putenv('SESSION_DRIVER=array');
    $_ENV['SESSION_DRIVER'] = 'array';
    $_SERVER['SESSION_DRIVER'] = 'array';
}
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

$sessionDriver = getenv('SESSION_DRIVER') ?: 'file';
if ($sessionDriver === 'file') {
    $sessionPath = __DIR__.'/../storage/framework/sessions';
    if (!is_dir($sessionPath) || !is_writable($sessionPath)) {
        $app->make('config')->set('session.driver', 'array');
    }
}

$app->handleRequest(Request::capture());
