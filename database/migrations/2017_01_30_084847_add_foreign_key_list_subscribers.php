<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyListSubscribers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('list_subscribers', function (Blueprint $table) {
           //добавляем связь между таблицами
            $table->foreign('subscriber_id','FK_list_subscribers_subscribers')->references('id')->on('subscribers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('list_subscribers', function (Blueprint $table) {
            //
        });
    }
}
