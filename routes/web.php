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

Route::get('/sms', function () {
    $user = BenZee\User::find(1);

    $user->notify(new BenZee\Notifications\RequestRecieved($user));
});

Auth::routes();

Route::post('/request', 'RequestsController@store')->name('request.store');

Route::get('/booking/pay/{booking}', 'BookingsController@create')->name('bookings.pay');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/manage', 'HomeController@manage')->name('manage');
    
    Route::get('/request/{request}', 'RequestsController@show')->name('request.show');
    Route::post('/booking', 'BookingsController@store')->name('booking.store');

    

});

Route::get('/room', 'RoomsController@create')->name('room.create');
<<<<<<< HEAD
Route::post('/room', 'RoomsController@store')->name('room.create');


=======
Route::post('/room', 'RoomsController@store')->name('room.store');
>>>>>>> 4d39541e71518a07957f8c43fea7ed7218aab987

