<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(\Illuminate\Foundation\Vite::class, \App\Support\VercelVite::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (env('VERCEL_STORAGE_PATH')) {

            URL::forceScheme('https');

            $this->app->useStoragePath(env('VERCEL_STORAGE_PATH'));

            $directories = [
                'app',
                'framework/cache/data',
                'framework/sessions',
                'framework/views',
                'framework/testing',
                'logs',
            ];

            foreach ($directories as $directory) {
                $path = storage_path($directory);

                if (!is_dir($path)) {
                    mkdir($path, 0755, true);
                }
            }
        }
    }
}