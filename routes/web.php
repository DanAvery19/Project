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

Route::get('/home', 'HomeController@registered');

Route::get('/dashboard', [
	'uses' => 'ChatController@getDashboard',
	'as' => 'post.create',
	'middleware' => 'auth' 
	]);

Route::post('/createpost', [
	'uses' => 'ChatController@postCreatePost',
	'as' => 'post.create',
	'middleware' => 'auth' 
	]);

	