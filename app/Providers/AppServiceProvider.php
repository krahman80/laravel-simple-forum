<?php

namespace App\Providers;

use App\Models\Community;
use App\Models\Post;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        View::share('newestPost', Post::with('community')->latest()->take(5)->get());
        View::share('newestCommunity', Community::withCount('posts')->latest()->take(5)->get());
    }
}
