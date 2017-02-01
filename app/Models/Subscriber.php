<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Subscriber extends Model
{
	//какие поля можно записывать в таблицу
   protected $fillable=['user_id','first_name','last_name','email'];
}
