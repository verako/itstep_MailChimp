<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailSendSetting extends Model
{
	protected $table="email_send_settings";
    public $timestamps = false;
    protected $fillable=['user_id','type_send_id'];
}
