<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTrucksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_trucks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id');
            $table->string('truck_name');
            $table->string('max_weight');
            $table->string('max_volume');
            $table->string('number_plate');
            $table->float('percent_volume_left')->default(100);
            $table->float('percent_weight_left')->default(100);
            $table->string('current_city');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *u-
     * @return void
     */
    public function down()
    {
        Schema::drop('user_trucks');
    }
}
