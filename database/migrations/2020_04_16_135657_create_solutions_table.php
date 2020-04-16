<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solutions', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('animal_id')->unsigned()->index()->nullable();
            $table->foreign('animal_id')->references('id')->on('animals');

            $table->integer('karma_id')->unsigned()->index()->nullable();
            $table->foreign('karma_id')->references('id')->on('karmas');


            $table->string('EnerjiSonuc');
            $table->string('KmSonuc');
            $table->string('HpSonuc');
            $table->string('LifSonuc');
            $table->string('KulSonuc');
            $table->string('KarbonhidratSonuc');
            $table->string('KalsiyumSonuc');
            $table->string('FosforSonuc');
            $table->string('Ca_pSonuc');
            $table->string('MeganizyumSonuc');
            $table->string('SodyumSonuc');
            $table->string('TaurinSonuc');
            $table->string('YagSonuc');
            $table->string('LinoliekAsitSonuc');

            $table->decimal('EnerjiPercent');
            $table->decimal('KmPercent');
            $table->decimal('HpPercent');
            $table->decimal('LifPercent');
            $table->decimal('KulPercent');
            $table->decimal('KarbonhidratPercent');
            $table->decimal('KalsiyumPercent');
            $table->decimal('FosforPercent');
            $table->decimal('Ca_pPercent');
            $table->decimal('MeganizyumPercent');
            $table->decimal('SodyumPercent');
            $table->decimal('TaurinPercent');
            $table->decimal('YagPercent');
            $table->decimal('LinoliekAsitPercent');

            $table->decimal('EnerjiKM');
            $table->decimal('KmKM');
            $table->decimal('HpKM');
            $table->decimal('LifKM');
            $table->decimal('KulKM');
            $table->decimal('KarbonhidratKM');
            $table->decimal('KalsiyumKM');
            $table->decimal('FosforKM');
            $table->decimal('Ca_pKM');
            $table->decimal('MeganizyumKM');
            $table->decimal('SodyumKM');
            $table->decimal('TaurinKM');
            $table->decimal('YagKM');
            $table->decimal('LinoliekAsitKM');
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
        Schema::dropIfExists('solutions');
    }
}
