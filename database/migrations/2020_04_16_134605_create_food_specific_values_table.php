<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodSpecificValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_specific_values', function (Blueprint $table) {
            $table->Increments('id');
            $table->bigInteger('specific_value');

            $table->integer('food_specific_id')->unsigned()->index()->nullable();
            $table->foreign('food_specific_id')->references('id')->on('food_specifics');

            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('food_specific_values');
    }
}
