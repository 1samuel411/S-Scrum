<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/logout', 'PagesController@logout');

Route::get('/account', 'PagesController@account');

Route::get('/about', 'PagesController@about');

Route::get('/', 'PagesController@home');

Route::get('/register', 'PagesController@register');
Route::post('/register', 'PagesController@register');

Route::get('/login', 'PagesController@login');
Route::post('/login', 'PagesController@login');

Route::get('/send', 'PagesController@send');
Route::post('/send', 'PagesController@send');