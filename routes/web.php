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

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::group(array("prefix"=>"employee","middleware"=>"auth"),function(){

    Route::resource('vacationfulltime', 'User\VacationFulltimeController',['except' =>['show']]
	);

	Route::resource('vacationparttime', 'User\VacationParttimeController', ['except' =>['show']]);

	Route::resource('profile', 'User\ProfileController', ['only' => [
    	'index', 'edit', 'update'
	]]);

	Route::resource('employs','User\EmployeeController')->middleware('usercheck');
});
