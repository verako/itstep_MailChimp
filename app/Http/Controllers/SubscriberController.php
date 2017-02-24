<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Lists\Create as CreateRequest;
use App\Models\Subscriber as SubscriberModel;//подключаем модель,добавляем ей алиас SubscriberModel
use App\User as UserModel;
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
        $subscribers= UserModel::find(\Auth::user()->id)->subscribers()->paginate(5);
        
       return view('subscribers.index',[ 'subscribers'  => $subscribers ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('subscribers.create',['subscriber'=>new SubscriberModel()]);
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
        $subscriber=SubscriberModel::create([
            'user_id'=>\Auth::user()->id,
            'first_name'=>$request->get('first_name'),
            'last_name'=>$request->get('last_name'),
            'email'=>$request->get('email')
            ]);
        // $lis=\Lang::get('listindex.List');
        // $create=\Lang::get('listindex.create');
        // return redirect('/lists')->with(['flash_message'=> $lis.' '.$list->name.' '.$create]);
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
        
        $subscriber=SubscriberModel::findOrFail($id);//find($id)->toArray();
        return view('subscribers.create',['subscriber'=>$subscriber]);
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
     
        $subscriber=SubscriberModel::findOrFail($id);
        $subscriber['first_name']=$request->get('first_name');
        $subscriber['last_name']=$request->get('last_name');
        $subscriber['email']=$request->get('email');
        $subscriber->save();
        $dat=\Lang::get('subscribersindex.data');
        $up=\Lang::get('subscribersindex.update');
        return redirect('/subscribers')->with(['flash_message'=>$dat.' '.$subscriber->email.' '.$up]);
       
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
        $dat=\Lang::get('subscribersindex.data');
        $removed=\Lang::get('subscribersindex.removed');
        return redirect('/subscribers')->with(['flash_message'=>$dat.' '.$subscriber->first_name.' '.$removed]);

    }

    protected function validator(array $data){
        return \Validator::make($data,[
            'first_name'=>'required|max:128|min:2',
            'last_name'=>'required|max:128|min:2',
            'email'=>'required|email|max:256|unique:subscribers'
            ]);
    }
}
