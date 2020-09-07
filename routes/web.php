<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Main routes
Route::get('/', 'PostController@index')
    ->name('main.index');
Route::get('/posts/{slug}', 'PostController@show')
    ->name('post.show');
Route::get('tags/{slug}', 'PageController@tag')
    ->name('tag.show');
Route::get('categories/{slug}', 'PageController@category')
    ->name('category.show');
Route::get('/about-me', 'PageController@about')
    ->name('pages.about');

Route::group(['middleware' => 'auth'], function () {
    Route::post('/comment', 'CommentController@store')
        ->name('user.comment');
});

Route::group(['middleware' => 'guest'], function () {
    Route::post('/subscribe', 'SubsController@subscribe')
        ->name('user.subscribe');
    Route::get('/verify/{token}', 'SubsController@verify')
        ->name('user.verify');
});

// Registration
Route::group(
    ['prefix' => 'users', 'namespace' => 'Auth', 'middleware' => 'guest'],
    function () {
        Route::get('/create', 'AuthController@create')
            ->name('user.create');
        Route::post('/store', 'AuthController@store')
            ->name('user.store');
        Route::get('/login', 'AuthController@loginForm')
            ->name('user.login-page');
        Route::post('/login', 'AuthController@login')
            ->name('user.login');
    }
);

Route::group(
    ['prefix' => 'users', 'namespace' => 'Auth', 'middleware' => 'auth'],
    function () {
        Route::get('/logout', 'AuthController@logout')
            ->name('user.logout');
        Route::get('/profile', 'AuthController@edit')
            ->name('user.edit');
        Route::patch('/update', 'AuthController@update')
            ->name('user.update');
        Route::get('/show/{id}', 'AuthController@show')
            ->name('user.show');
    }
);


// Administration
Route::group(
    ['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'],
    function () {
        Route::get('/', 'DashboardController@index')
            ->name('dashboard.index');
        Route::resource('/categories', 'CategoryController');
        Route::resource('/tags', 'TagController');
        Route::resource('/users', 'UserController');
        Route::resource('/posts', 'PostController');
        Route::get('/comments', 'CommentController@index')
            ->name('comments.index');
        Route::post('/comments/status/{id}', 'CommentController@status')
            ->name('comments.status');
        Route::delete('/comments/{id}/destroy', 'CommentController@destroy')
            ->name('comments.destroy');
        Route::resource('/subscribers', 'SubscribersController');
    }
);
