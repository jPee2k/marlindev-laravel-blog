<?php

namespace App\Providers;

use App\Tag;
use App\User;
use App\Post;
use App\Comment;
use App\Category;
use App\Subscription;
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
            $view->with('postsCount', Post::all()->count());
            $view->with('tagsCount', Tag::all()->count());
            $view->with('commentsCount', Comment::all()->count());
            $view->with('subsCount', Subscription::all()->count());
            $view->with('usersCount', User::all()->count());
            $view->with('categoriesCount', Category::all()->count());
        });

        view()->composer('layouts.blog', function ($view) {
            $view->with('randomPost', Post::where('status', 1)->inRandomOrder()->first());
        });
    }
}
