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
// admin
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/', 'Auth\LoginController@showLoginForm');
    Route::post('login', 'Auth\LoginController@login')->name('admin.login');
    Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');
    Route::get('register', 'Auth\RegisterController@showRegistrationForm');
    Route::post('register', 'Auth\RegisterController@register')->name('admin.register');
    Route::get('home', 'HomeController@index');
    Route::resource('attendsions', 'AttendsionController', ['only' =>[
		'index','show',
	]]);
	Route::get('overtimes/statistical/{statistical}', 'OvertimeController@statistical')->name('overtimes.statistical');
	Route::resource('overtimes', 'OvertimeController', ['only' =>[
		'index','show',
	]]);
	Route::resource('reports', 'ReportController',['only' => [
    	'index', 'show',
	]]);
});
// user
Auth::routes();

	
});