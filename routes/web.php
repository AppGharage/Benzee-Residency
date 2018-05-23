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

//Route to display Page to Create Request
Route::get('/request', 'RequestsController@create');
//Handle request Storage
Route::post('/request', 'RequestsController@store');



//Route To Display New Admin Page
    Route::get('/users', 'AdminController@create');
    //Route to store New Admin User
    Route::post('/users', 'AdminController@store');
    //Rotue to delete new Admin User
    Route::post('/users/{id}', 'AdminController@delete');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
