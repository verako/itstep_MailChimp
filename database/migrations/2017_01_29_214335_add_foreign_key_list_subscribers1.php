<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyListSubscribers1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('list_subscribers', function (Blueprint $table) {
            $table->foreign('list_id','FK_list_subscribers_lists')->references('id')->on('lists');//добавляем связь между таблицами
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_subscribers');
    }
}
