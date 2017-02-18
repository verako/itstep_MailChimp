<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ListModel extends Model
{
	use SoftDeletes;

	//с какой таблицей работать
    protected $table='lists';
    
    //какие поля использовать
    protected $fillable=['user_id','name'];

    public function subscribers(){
		return $this->belongsToMany('App\Models\Subscriber','list_subscribers','list_id','subscriber_id');
	}


}
