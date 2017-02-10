<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class LanguageController extends Controller
{
     public function chooser(){
    	//echo Input::get('locale');//выводим какой язык выбран
    	\Session::put('locale',Input::get('locale'));//заносим в сессии выбранный язык
    	return redirect()->back();
    	//return redirect()->action('HomeController@index');
    }
}
