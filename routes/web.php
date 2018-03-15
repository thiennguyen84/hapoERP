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
    return view('auth.login');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/', 'Auth\LoginController@showLoginForm');
    Route::post('login', 'Auth\LoginController@login')->name('admin.login');
    Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');
    Route::get('register', 'Auth\RegisterController@showRegistrationForm');
    Route::post('register', 'Auth\RegisterController@register')->name('admin.register');
    Route::get('home', 'HomeController@index');
    Route::resource('employee', 'EmployeeController',['except' => [
    	'edit', 'update'
	]]);
	Route::get('/vacation','VacationController@index')->name('vacation.index');
	Route::resource('fulltime', 'VacationFulltimeController',['only' => [
    	'show'
	]]);
    Route::resource('parttime', 'VacationParttimeController',['only' => [
        'show'
    ]]);
    Route::get('/salary', 'SalaryController@index')->name('salary.index');
    Route::get('/salary/{id}', 'SalaryController@create')->name('salary.create');
    Route::post('/salary/{id}', 'SalaryController@store')->name('salary.store');
});

Auth::routes();

Route::group(array("prefix"=>"employee","middleware"=>"auth"),function(){

    Route::resource('vacationfulltime', 'User\VacationFulltimeController',['except' =>['show']]
	);

	Route::resource('vacationparttime', 'User\VacationParttimeController', ['except' =>['show']]);

	Route::resource('profile', 'User\ProfileController', ['only' => [
    	'index', 'edit', 'update'
	]]);

	Route::resource('employs','User\EmployeeController');
});