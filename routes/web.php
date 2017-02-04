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

Route::get('/home', 'HomeController@index');

Route::get('/model', 'HomeController@model');

//создаем груповой роут, создаются роуты для каждого метода в subscriberController
Route::group(['middleware'=>'auth'],function(){
	Route::resource('subscribers','SubscriberController');
	Route::resource('lists','ListController');
});

