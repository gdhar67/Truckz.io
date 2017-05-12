<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJourneyPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journey_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id');
            $table->integer('booking_request_id');
            $table->integer('truck_id');
            $table->string('space_allocation');
            $table->string('end_to_end');
            $table->string('source');
            $table->string('destination');
            $table->date('pickup_date');
            $table->time('pickup_time');
            $table->date('dropoff_date');
            $table->time('dropoff_time');
            $table->float('journey_fare');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('journey_plans');
    }
}
