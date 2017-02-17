<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    //связь один ко многим, у одного юзера много подписчиков
    public function subscribers(){
        return $this->hasMany('App\Models\Subscriber');
    }
    public function lists(){
        return $this->hasMany('App\Models\ListModel');
    }
}
