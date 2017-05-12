<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id');
            $table->string('source');
            $table->string('destination');
            $table->integer('total_no_of_items');
            $table->float('total_weight')->nullable();
            $table->float('total_volume')->nullable();
            $table->date('pickup_date');
            $table->time('pickup_time');
            $table->date('dropoff_date');
            $table->time('dropoff_time');
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
        Schema::drop('booking_requests');
    }
}
