<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(\Illuminate\Foundation\Vite::class, function () {
            return new class extends \Illuminate\Foundation\Vite {
                protected function manifestPath($buildDirectory)
                {
                    $customPath = base_path('storage/manifest.json');
                    if (file_exists($customPath)) {
                        return $customPath;
                    }
                    return parent::manifestPath($buildDirectory);
                }
            };
        });
    }

    public function boot(): void
    {
        // Redirect storage path to /tmp on Vercel (read-only filesystem workaround)
        if (env('VERCEL_STORAGE_PATH')) {
            // Force HTTPS on Vercel to prevent mixed content blocking
            \Illuminate\Support\Facades\URL::forceScheme('https');

            $storagePath = env('VERCEL_STORAGE_PATH');
            $this->app->useStoragePath($storagePath);

            // Ensure required storage subdirectories exist
            $directories = [
                'app', 
                'framework/cache/data', 
                'framework/sessions', 
                'framework/views', 
                'framework/testing', 
                'logs'
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
