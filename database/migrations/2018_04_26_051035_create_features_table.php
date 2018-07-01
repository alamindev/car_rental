<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('car_id')->unsigned();
            $table->foreign('car_id')
                ->references('id')
                ->on('cars');
            $table->string('feature_1');
            $table->string('feature_2');
            $table->string('feature_3')->nullable();
            $table->string('feature_4')->nullable();
            $table->string('feature_5')->nullable();
            $table->string('feature_6')->nullable();
            $table->string('feature_7')->nullable();
            $table->string('feature_8')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('features');
    }
}
