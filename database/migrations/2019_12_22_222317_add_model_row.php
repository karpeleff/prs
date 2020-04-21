<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddModelRow extends Migration
{
    /**
     * Run the migrations.
     * 
     * добавляем поле в существующую таблицу
     * 
     *
     * @return void
     */
    public function up()
    {
       Schema::table('fires', function (Blueprint $table) {
        $table->char('model',100);
});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
