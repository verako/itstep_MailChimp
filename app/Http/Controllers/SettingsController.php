<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailSendSetting;
use App\User as UserModel;

class SettingsController extends Controller
{
    public function index()
    {
    	$types=\DB::table('email_send_types')->get();
        return view('settings.index',['types'=>$types]);
       
    }
    public function store(Request $request)//валидация идет через CreateRequest
    {
    	

    	$set=EmailSendSetting::where('user_id',\Auth::id())->first();
    	if (!$set){
    	$setting=EmailSendSetting::create([
            'user_id'=>\Auth::user()->id,
            'type_send_id'=>$request->get('setting')
        ]);
    	}
    	else{
    		$setting=$set;
            $setting->type_send_id=$request->setting;
            $setting->save();
    	}
        return redirect()->back();
       

    }
}
