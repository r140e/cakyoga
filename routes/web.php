<?php

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

Route::get('/', 'IndexController@index');

Auth::routes(['reset' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/quotes', 'QuotesController@show');
Route::get('/quotes/manage', 'QuotesController@index');
Route::get('/quote/create', 'QuotesController@create');
Route::post('/quote/store', 'QuotesController@store');
Route::get('/quote/edit/{id}', 'QuotesController@edit');
Route::put('/quote/update/{id}', 'QuotesController@update');
Route::get('/quote/delete/{id}', 'QuotesController@destroy');

// Route::view('/projects/{path?}', 'tasks')->middleware('auth');
// Route::view('/completed/{path?}', 'tasks')->middleware('auth');

Route::get('/projects', 'ProjectsController@index');
Route::get('/projects/{slug}', 'ProjectsController@show');

// Get all published posts
Route::get('blog', 'BlogController@getPosts');
 
// Get posts for a given tag
Route::get('tag/{slug}', 'BlogController@getPostsByTag');
 
// Get posts for a given topic
Route::get('topic/{slug}', 'BlogController@getPostsByTopic');
 
// Find a single post
Route::middleware('Canvas\Http\Middleware\Session')->get('{slug}', 'BlogController@findPostBySlug');

Route::namespace('Studio')->prefix(config('studio.path'))->group(function () {
    Route::prefix('api')->group(function () {
        Route::prefix('posts')->group(function () {
            Route::get('/', 'PostController@index');
            Route::get('{identifier}/{slug}', 'PostController@show')->middleware('Canvas\Http\Middleware\Session');
        });

        Route::prefix('tags')->group(function () {
            Route::get('/', 'TagController@index');
            Route::get('{slug}', 'TagController@show');
        });

        Route::prefix('topics')->group(function () {
            Route::get('/', 'TopicController@index');
            Route::get('{slug}', 'TopicController@show');
        });

        Route::prefix('users')->group(function () {
            Route::get('{identifier}', 'UserController@show');
        });
    });

    Route::get('/{view?}', 'ViewController')->where('view', '(.*)')->name('studio');
});
