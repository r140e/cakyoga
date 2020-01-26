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

Route::view('/projects/{path?}', 'tasks')->middleware('auth');
Route::view('/completed/{path?}', 'tasks')->middleware('auth');
