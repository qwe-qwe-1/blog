<?php

namespace App\Providers;

use App\Repositories\PostRepository;
use App\Repositories\PostRepositoryInterface;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PostRepositoryInterface::class, PostRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        URL::forceHttps();
        config(['view.compiled' => env('VIEW_COMPILED_PATH', '/tmp')]);
        config(['cache.stores.file.path' => env('CACHE_PATH', '/tmp')]);
        config(['cache.stores.file.lock_path' => env('CACHE_PATH', '/tmp')]);
    }
}
