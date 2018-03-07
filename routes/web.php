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

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('home',function(){
	return redirect(url('employee/report'));
});
Route::group(array("prefix"=>"admin","middleware"=>"auth"),function(){
	//logout
	Route::get('logout',function(){
		Auth::logout();
		return redirect(url('login'));
	});
});
Route::group(array("prefix"=>"employee","middleware"=>"auth"),function(){
	Route::get('logout',function(){
		Auth::logout();
		return redirect(url('login'));
	});
	Route::get('attendsion/statistic', 'User\AttendsionController@statistic')->name('attendsion.statistic');
	Route::get('overtime/statistic', 'User\OvertimeController@statistic')->name('overtime.statistic');
	Route::resource('report', 'User\ReportController',['except' => [
    	'destroy'
	]]);
	Route::resource('overtime', 'User\OvertimeController');
	Route::resource('attendsion', 'User\AttendsionController',['only' =>[
		'index','create'
	]]);
	
});