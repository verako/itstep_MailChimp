<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyEmailSendSettings1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('email_send_settings', function (Blueprint $table) {
            $table->foreign('user_id','FK_email_send_settings_users')->references('id')->on('users');//добавляем связь между таблицами
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('email_send_settings');
    }
}
