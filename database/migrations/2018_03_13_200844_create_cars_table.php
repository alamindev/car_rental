<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('car_name');
            $table->string('title');
            $table->text('car_details')->nullable();
            $table->integer('miniAge')->nullable();
            $table->integer('year')->nullable();
            $table->boolean('isAuto')->default(false);
            $table->string('picture');
            $table->string('registration')->nullable();
            $table->text('price_per_hour', 20);
            $table->text('price_per_day', 20)->nullable();
            $table->text('price_per_month', 20)->nullable();
            $table->integer('model_id')->unsigned();
            $table->integer('fual_id')->unsigned();
            $table->integer('color_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->integer('branch_id')->unsigned()->nullable();
            $table->integer('capacity_id')->unsigned();
            $table->boolean('status')->default(1);
            $table->date('date');
            $table->string('feature')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::table('cars', function (Blueprint $table) {
            $table->foreign('model_id')
                ->references('id')
                ->on('car_models');
            $table->foreign('fual_id')
                ->references('id')
                ->on('fuals');
            $table->foreign('color_id')
                ->references('id')
                ->on('colors');
            $table->foreign('category_id')
                ->references('id')
                ->on('categories');
            $table->foreign('branch_id')
                ->references('id')
                ->on('branches');
            $table->foreign('capacity_id')
                ->references('id')
                ->on('capacities');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
