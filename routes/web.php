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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/', 'DashboardController@index')
        ->name('dashboard.index');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/tags', 'TagController');
    Route::resource('/users', 'UserController');
    Route::resource('/posts', 'PostController');
});
