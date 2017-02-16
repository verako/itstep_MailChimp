<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Test as TestMail;

class SendController extends Controller
{
    // public function index(){
    //     return view('send.index');
    // }
    public function form(){
    	return view('send.form');
    }
    public function send(Request $request){ //что отправить, функция замыкания
    	// \Mail::raw($request->get('message'),function($message) use ($request){
    	// 	$message->to($request->get('to'))->subject($request->get('subject'));
    	
    	// $data=['text'=>$request->get('message')];
    	// \Mail::send('emails.test', $data, function($message) use ($request){
    	// 	$message->to($request->get('to'))->subject($request->get('subject'));});

    	$mail=new TestMail($request->get('message'), $request->get('subject'));
    	\Mail::to($request->get('to'))->send($mail);

    	
    }
}
