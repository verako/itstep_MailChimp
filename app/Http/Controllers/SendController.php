<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Test as TestMail;
use App\User as UserModel;
use App\Models\ListModel;
use App\Jobs\SendEmail as SendEmailJobs;

class SendController extends Controller
{
    // public function index(){
    //     return view('send.index');
    // }
    public function form(){
        $lists=UserModel::find(\Auth::user()->id)->lists()->get();
    	return view('send.form',['lists'=>$lists]);
    }
    public function send(Request $request){ //что отправить, функция замыкания
    	// \Mail::raw($request->get('message'),function($message) use ($request){
    	// 	$message->to($request->get('to'))->subject($request->get('subject'));
    	
    	// $data=['text'=>$request->get('message')];
    	// \Mail::send('emails.test', $data, function($message) use ($request){
    	// 	$message->to($request->get('to'))->subject($request->get('subject'));});

    	// $mail=new TestMail($request->get('message'), $request->get('subject'));
    	// \Mail::to($request->get('to'))->queue($mail);// queue добавляем в очередь

        // //отправка с задержкой
        // $when=\Carbon\Carbon::now()->addMinutes(1);
        // $mail=new TestMail($request->get('message'), $request->get('subject'));
        // \Mail::to($request->get('to'))->later($when,$mail);

        // $listSubscribers=ListModel::findOrFail($request->get('list_id'))->subscribers()->get();
        //     foreach ($listSubscribers as $subscriber) {
        //         $mail=new TestMail($request->get('message'),$request->get('subject'));
        //         \Mail::to($subscriber->email)->send($mail);
        //     }

        dispatch(new SendEmailJobs(
            $request->get('list_id'),
            $request->get('message'),
            $request->get('subject'),
            \Auth::user()->id
            ));
    	
    }
}
