<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscriber extends Model
{
	use SoftDeletes;//подключаем трейт

	//какие поля можно записывать в таблицу
   protected $fillable=['user_id','first_name','last_name','email'];

    public function lists(){
		return $this->belongsToMany('app\Models\ListModel','list_subscribers','subscriber_id','list_id');
	}
}
