<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AssetUrlServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Forzar la URL base sin /public para los assets
        $appUrl = config('app.url');
        
        // Remover /public si existe en la URL
        $cleanUrl = str_replace('/public', '', $appUrl);
        
        // Forzar la URL base
        URL::forceRootUrl($cleanUrl);
        
        // Opcional: Log para debugging
        if (config('app.debug')) {
            \Log::info("Asset URL configured: {$cleanUrl}");
        }
    }
}