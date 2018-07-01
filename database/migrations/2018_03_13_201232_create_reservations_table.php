<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('car_id')->unsigned();
            $table->integer('pickupLocation')->unsigned();
            $table->integer('returnLocation')->unsigned();
            $table->date('pickupDate');
            $table->time('pickupTime');
            $table->date('returnDate');
            $table->time('returnTime');
            $table->text('extra')->nullable();
            $table->integer('price');
            $table->boolean('isPending')->default(0);
            $table->boolean('isPaid')->default(0);
            $table->boolean('isComplated')->default(0);
            $table->softDeletes();
            $table->nullableTimestamps();
        });
        Schema::table('reservations', function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('id')->on('users')->onDelete('cascade');
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
            $table->foreign('pickupLocation')->references('id')->on('branches')->onDelete('cascade');
            $table->foreign('returnLocation')->references('id')->on('branches')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
