<?php

namespace App\Providers;



use App\Services\v1\CommentServices;
use App\Services\v1\contracts\CommentServicesContract;
use App\Services\v1\contracts\PostServicesContract;
use App\Services\v1\contracts\TagServicesContract;
use App\Services\v1\PostServices;
use App\Services\v1\TagServices;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PostServicesContract::class, PostServices::class);
        $this->app->bind(CommentServicesContract::class, CommentServices::class);
        $this->app->bind(TagServicesContract::class, TagServices::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {}
}
