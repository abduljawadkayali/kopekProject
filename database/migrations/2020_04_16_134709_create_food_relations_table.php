<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_relations', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('food_id')->unsigned()->index()->nullable();
            $table->foreign('food_id')->references('id')->on('foods');
            $table->integer('food_specific_value_id')->unsigned()->index()->nullable();
            $table->foreign('food_specific_value_id')->references('id')->on('food_specific_values');
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
        Schema::dropIfExists('food_relations');
    }
}
