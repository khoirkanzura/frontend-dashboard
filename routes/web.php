<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\SettingsController;

// Langsung arahkan root ke dashboard
Route::redirect('/', '/dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/loans', [LoanController::class, 'index'])->name('loans');
Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
Route::post('/settings/update', [SettingsController::class, 'update'])->name('settings.update');

// Debug file deployment
Route::get('/debug-files', function () {
    return response()->json([
        'base_path' => base_path(),
        'storage_path' => storage_path(),

        'manifest_exists_storage' => file_exists(base_path('storage/manifest.json')),
        'manifest_exists_public' => file_exists(public_path('build/manifest.json')),
        'manifest_exists_public_vite' => file_exists(public_path('build/.vite/manifest.json')),

        'storage_files' => file_exists(base_path('storage'))
            ? scandir(base_path('storage'))
            : null,

        'public_files' => file_exists(public_path())
            ? scandir(public_path())
            : null,

        'public_build_files' => file_exists(public_path('build'))
            ? scandir(public_path('build'))
            : null,
    ]);
});

// Debug build Vite
Route::get('/debug-build', function () {
    return response()->json([
        'public_exists' => is_dir(public_path()),
        'build_exists' => is_dir(public_path('build')),
        'manifest_exists' => file_exists(public_path('build/manifest.json')),
        'manifest_path' => public_path('build/manifest.json'),
    ]);
});