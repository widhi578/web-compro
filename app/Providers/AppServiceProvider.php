<?php

namespace App\Providers;

use App\Models\SiteContent;
use App\Support\WebResourceManager;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(
            WebResourceManager::class,
            fn (): WebResourceManager => new WebResourceManager(config('web-resources.resources', [])),
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::share('contentValue', static fn (string $key): string => SiteContent::value($key));
        View::share('webResources', app(WebResourceManager::class));
    }
}
