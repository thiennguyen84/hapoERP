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

Route::get('/home', 'HomeController@index')->name('home');

Route::group(array("prefix"=>"employee","middleware"=>"auth"),function(){
    Route::get('logout',function(){
        Auth::logout();
        return redirect(url('login'));
    });

    Route::resource('vacationfulltime', 'User\VacationFulltimeController',['except' =>['show']]
	);

	Route::resource('vacationparttime', 'User\VacationParttimeController', ['except' =>['show']]);
});
