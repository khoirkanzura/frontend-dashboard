<?php

namespace App\Support;

use Illuminate\Foundation\Vite;

class VercelVite extends Vite
{
    /**
     * Get the path to the manifest file.
     *
     * @param  string  $buildDirectory
     * @return string
     */
    protected function manifestPath($buildDirectory)
    {
        // On Vercel, public files are routed to the CDN and not present in the local serverless function directory.
        // Therefore, we load the manifest from bootstrap/cache/manifest.json or storage/manifest.json.
        $bootstrapManifest = base_path('bootstrap/cache/manifest.json');
        if (file_exists($bootstrapManifest)) {
            return $bootstrapManifest;
        }

        $storageManifest = base_path('storage/manifest.json');
        if (file_exists($storageManifest)) {
            return $storageManifest;
        }

        return parent::manifestPath($buildDirectory);
    }
}
