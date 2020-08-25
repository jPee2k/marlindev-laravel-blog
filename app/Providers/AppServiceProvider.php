<?php

namespace App\Providers;

use App\Post;
use App\Category;
use Illuminate\Support\ServiceProvider;

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
        view()->composer('page.post.inc.sidebar', function ($view) {
            $view->with('popularPosts', Post::where('status', 1)
                ->orderBy('views', 'desc')->take(3)->get());
            $view->with('featuredPosts', Post::where('status', 1)
                ->where('is_featured', 1)->orderBy('views')->take(3)->get());
            $view->with('recentPosts', Post::where('status', 1)
                ->orderBy('date', 'desc')->take(4)->get());
            $view->with('categories', Category::all());
        });
    }
}
