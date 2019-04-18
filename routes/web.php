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


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/admin', 'UserController@index')->middleware('auth');

Route::get('/admin/{id}', 'UserController@getById');

Route::post('/admin/update/{id}', 'UserController@update');

Route::delete('/admin/{id}', 'UserController@destroy');

Route::post('/admin/status/{id}', 'UserController@status');

Route::get('/posts/create', 'PostsController@create');

Route::post('/posts', 'PostsController@store');

Route::get('/posts/{post}', 'PostsController@show');

Route::post('/posts/{post}/comments','CommentsController@store');

Route::delete('/posts/{id}', 'PostsController@destroy');

Route::get('/posts/modal/{id}', 'PostsController@getById');

Route::post('/posts/update/{id}', 'PostsController@update');

Route::get('/create-users', 'CreateUsersController@index');

Route::post('/admin', 'CreateUsersController@store');

Route::get('/profile-admin', 'UserController@store');


