<?php

Route::get('/', 'PostsController@index');

Route::get('/post/{id}', 'PostsController@post');

Route::get('/create', 'PostsController@create')->middleware('auth');

Route::post('/posts', 'PostsController@store_post');

Route::get('/my_posts', 'PostsController@my_posts')->middleware('auth');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'PostsController@index')->name('home');

Route::get('/edit/{id}', 'PostsController@edit_post')->middleware('auth');

Route::put('/posts/{id}', 'PostsController@update')->middleware('auth');

Auth::routes();