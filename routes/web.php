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

Route::get('/step', function () {
    return view('step');
});


Route::resource('/application', 'ApplicationController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/confirm-email/{uuid}', 'ConfirmEmailController@index')->name('confirm-email');


Route::resource('/task', 'TaskController');