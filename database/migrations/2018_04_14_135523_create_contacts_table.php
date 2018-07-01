<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('reg_address');
            $table->string('email_address');
            $table->string('call_us');
            $table->string('sms');
            $table->text('google_link');
            $table->string('open_day_1');
            $table->string('open_time_1');
            $table->string('open_day_2');
            $table->string('open_time_2');
            $table->string('open_day_3');
            $table->string('open_time_3');

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
        Schema::dropIfExists('contacts');
    }
}
