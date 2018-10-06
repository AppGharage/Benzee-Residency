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

Route::get('/ ', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/payment', 'PaymentsController@index')->name('payment.index');

Route::post('/request', 'RequestsController@store')->name('request.store');

Route::get('/booking/pay/{booking}', 'BookingsController@create')->name('bookings.pay');

Route::post('/booking/pay', 'PaymentsController@booking')->name('payments.booking');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/manage', 'HomeController@manage')->name('manage');
    
    Route::get('/request/{request}', 'RequestsController@show')->name('request.show');

    Route::post('/booking', 'BookingsController@store')->name('booking.store');

    Route::get('/rooms/create', 'RoomsController@create')->name('rooms.create');

    Route::post('/rooms', 'RoomsController@store')->name('rooms.store');

    Route::get('/booking/assign/{booking}', 'BookingsController@assign')->name('booking.assign');

    Route::post('/resident/allocation', 'ResidentController@allocate')->name('resident.allocate');

    Route::get('/resident/create', 'ResidentController@create')->name('resident.create');

    Route::post('/resident', 'ResidentController@store')->name('resident.store');

    
    Route::get('/anouncement', 'AnouncementController@index')->name('anouncement.index');
    
    Route::get('/anouncement/create', 'AnouncementController@create')->name('anouncement.create');

    Route::get('/anouncement/{id}', 'AnouncementController@singleAnouncement')->name('anouncement.single');
});
