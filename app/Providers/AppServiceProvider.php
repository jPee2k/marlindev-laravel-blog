<?php

namespace App\Providers;

use App\Post;
use App\Comment;
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
        view()->composer('page.inc.sidebar', function ($view) {
            $view->with('popularPosts', Post::where('status', 1)
                ->orderBy('views', 'desc')->take(3)->get());
            $view->with('featuredPosts', Post::where('status', 1)
                ->where('is_featured', 1)->orderBy('views')->take(3)->get());
            $view->with('recentPosts', Post::where('status', 1)
                ->orderBy('date', 'desc')->take(4)->get());
            $view->with('categories', Category::all());
        });

        view()->composer('layouts.admin', function ($view) {
            $view->with('newCommentsCount', Comment::where('status', 0)->count());
        });

        view()->composer('layouts.blog', function ($view) {
            $view->with('randomPost', Post::where('status', 1)->inRandomOrder()->first());
        });
    }
}
