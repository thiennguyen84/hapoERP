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

Route::get('home',function(){
	return redirect()->route('attendsion.index');
});

Route::group(array("prefix"=>"employee","middleware"=>"auth"),function(){
	Route::post('logout',function(){
		Auth::logout();
		return redirect()->route('login');
	})->name('logout');
	Route::resource('report', 'User\ReportController',['except' => [
    	'destroy'
	]]);
	Route::get('overtime/statistical', 'User\OvertimeController@statistical')->name('overtime.statistical');
	Route::resource('overtime', 'User\OvertimeController');
	Route::get('attendsion/statistical', 'User\AttendsionController@statistical')->name('attendsion.statistical');
	Route::resource('attendsion', 'User\AttendsionController',['only' =>[
		'index','store',
	]]);
	
});