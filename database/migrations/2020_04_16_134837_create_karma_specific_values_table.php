<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKarmaSpecificValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karma_specific_values', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('karma_id')->unsigned()->index()->nullable();
            $table->foreign('karma_id')->references('id')->on('karmas');
            $table->decimal('Enerji');
            $table->decimal('Km');
            $table->decimal('Hp');
            $table->decimal('Lif');
            $table->decimal('Kul');
            $table->decimal('Karbonhidrat');
            $table->decimal('Kalsiyum');
            $table->decimal('Fosfor');
            $table->decimal('Ca_p');
            $table->decimal('Meganizyum');
            $table->decimal('Sodyum');
            $table->decimal('Taurin');
            $table->decimal('Yag');
            $table->decimal('LinoliekAsit');
            $table->decimal('Fiyat');
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
        Schema::dropIfExists('karma_specific_values');
    }
}
