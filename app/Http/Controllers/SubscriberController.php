<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber as SubscriberModel;//подключаем модель,добавляем ей алиас SubscriberModel
use App\User;
use DB;


class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscribers= User::find(\Auth::user()->id)->subscribers()->get();
        
       return view('subscribers.subscribers',[ 'subscribers'  => $subscribers ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('subscribers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo $request->has('first_name');//проверяет существует ли в реквесте first_name
        // exit;

        // print_r($request->only(['first_name']));//возвращает first_name
        // print_r(\Request::only(['first_name']));//можно использовать такую запись
        // exit;

        // print_r($request->except(['first_name']));//возвращает все кроме first_name
        // exit;

        $this->validator($request->all())->validate();
        SubscriberModel::create([
            'user_id'=>\Auth::user()->id,
            'first_name'=>$request->get('first_name'),
            'last_name'=>$request->get('last_name'),
            'email'=>$request->get('email')
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $Subscriber=SubscriberModel::find($id)->toArray();
        return view('subscribers.edit',$Subscriber);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     
        $subscriber=SubscriberModel::find($id);
        $subscriber['first_name']=$request->get('first_name');
        $subscriber['last_name']=$request->get('last_name');
        $subscriber['email']=$request->get('email');
        $subscriber->save();
        return redirect('/subscribers')->with(['flash_message'=>'Data '.$subscriber->email.' successfully update']);
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //удаляем строку
        $subscriber=SubscriberModel::find($id);
        SubscriberModel::find($id)->delete();
        return redirect('/subscribers')->with(['flash_message'=>'Subscriber '.$subscriber->first_name.' successfully delete']);

    }

    protected function validator(array $data){
        return \Validator::make($data,[
            'first_name'=>'required|max:128|min:2',
            'last_name'=>'required|max:128|min:2',
            'email'=>'required|email|max:256'
            ]);
    }
}
