<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;//подключаем модель Subscriber
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function model(){
        //первый способ создания записей в таблице
        // Subscriber::create([
        //     'user_id'=>\Auth::user()->id,// \-глобальный поиск имен
        //     'first_name'=>'John',
        //     'last_name'=>'doe',
        //     'email'=>'john_doe@mail.com'
        // ]);

        //второй метод
        // $subscriber =new Subscriber();

        // $subscriber->user_id=\Auth::user()->id;
        // $subscriber->first_name='first_name1';
        // $subscriber->last_name='last_name1';
        // $subscriber->email='test@mail.tr';
        // $subscriber->save();//метод модели save

        //обновить запись
        // $subscriberId=2;
        // $subscriber=Subscriber::find($subscriberId);
        // $subscriber->email='john_doe+1@mail.com';
        // $subscriber->save();

        //если нет заданого id выдает ошибку
        // $subscriberId=20;
        // $subscriber=Subscriber::findOrFail($subscriberId);

        //выводим об'ект первого first(), или всех get() найденного значения first_name1 в таблице Subscriber,в колонке first_name, toArray()-в массиве
        // echo "<pre>".print_r(Subscriber::where('first_name','first_name1')->get()->toArray(),true)."</pre>";
        
        //показать запрос в sql
       // echo Subscriber::where('first_name','first_name1')->toSql();

        //удаляем строку
       // Subscriber::find(2)->delete();

        //выыодим всех подписчиков юзера с ид 1
        echo "<pre>".print_r(User::find(2)->subscribers()->get()->toArray(),true)."</pre>";
    }
}
