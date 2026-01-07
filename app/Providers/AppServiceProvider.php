<?php

namespace App\Providers;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Config;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        foreach ([
            storage_path('framework/sessions'),
            storage_path('framework/cache'),
            storage_path('framework/views'),
            base_path('bootstrap/cache'),
        ] as $dir) {
            if (!is_dir($dir)) {
                File::makeDirectory($dir, 0755, true);
            }
        }
        if (Config::get('session.driver') === 'file') {
            $sessionPath = storage_path('framework/sessions');
            if (!is_dir($sessionPath)) {
                File::makeDirectory($sessionPath, 0755, true);
            }
            @ini_set('session.save_path', $sessionPath);
            $testFile = $sessionPath.'/.__writable_test';
            $writable = @file_put_contents($testFile, 'ok') !== false;
            if ($writable) {
                @unlink($testFile);
            } else {
                Config::set('session.driver', 'array');
            }
        }
        Gate::define('access-admin', function (User $user) {
            return $user->is_admin;
        });
    }
}
