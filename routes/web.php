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

Route::get('/', 'PageController@index')
    ->name('pages.index');

Route::get('/about-me', 'PageController@about')
    ->name('pages.about');

Route::get('/post/{slug}', 'PageController@show')
    ->name('pages.show');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/', 'DashboardController@index')
        ->name('dashboard.index');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/tags', 'TagController');
    Route::resource('/users', 'UserController');
    Route::resource('/posts', 'PostController');
});
