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

Route::get('/home', 'HomeController@index')->middleware('locale');

//Route::get('/model', 'HomeController@model');

//создаем груповой роут, создаются роуты для каждого метода в subscriberController
Route::group(['middleware'=>'auth'],function(){
	Route::resource('subscribers','SubscriberController');
	Route::resource('lists','ListController');
	//Route::resource('home','HomeController');
	Route::post('language',array(
	'before'=>'csrf',//проверяем,чтобы небыло перекрестных ссылок
	'as'=>'language-chooser',
	'uses'=>'LanguageController@chooser'//контроллер,который обрабатывае
	))->middleware('locale');
	Route::get('/send-email','SendController@form');
	Route::post('/send-email','SendController@send');
	Route::get('/settings', 'SettingsController@index');
});

Route::group(['middleware'=>'locale'],function(){
	//Route::resource('home','HomeController');
	Route::resource('lists','ListController');
	Route::resource('subscribers','SubscriberController');
	Route::resource('settings', 'SettingsController');
	//Route::resource('send-email','SendController');
});

