<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fires', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->double('weight', 8, 2);
            $table->char('install_place', 100);
            $table->char('category_place', 100);
            $table->integer('manufactory_number');
            $table->integer('inv_number');
            $table->char('stuff_type', 100);
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fires');
    }
}
