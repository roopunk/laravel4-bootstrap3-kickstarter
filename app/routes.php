<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showWelcome');


## Authentication related routes - login, logout, forgot password

Route::group(array('prefix' => 'auth'), function (){
	## Renders our login form
	Route::get('/login', 'AuthController@login');
	## Process login
	Route::post('/login', 'AuthController@doLogin');
});

## Admin routes

Route::group(array('prefix' => 'admin', 'before' => 'auth_admin'), function (){

	##Admin dashboard
	Route::get('dashboard', 'DashboardController@index');

	##User management
	Route::resource('user','UserController');
});

Route::get('test', function (){
	echo Hash::make('admin');
});

