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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/manage', 'HomeController@manage')->name('manage');
    
    Route::post('/request', 'RequestsController@store')->name('request.store');
    Route::get('/request/{request}', 'RequestsController@show')->name('request.show');
    Route::post('/booking', 'BookingsController@show')->name('booking.show');

});
