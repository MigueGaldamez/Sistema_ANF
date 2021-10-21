<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratio', function (Blueprint $table) {
            $table->increments('idRatio');
            $table->string('nombreRatio');
            $table->string('mensajeBueno');
            $table->string('mensajeMalo');
            $table->string('valorEstandar');
            $table->integer('evaluacion');
            $table->string('idRazon');
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
        Schema::dropIfExists('ratio');
    }
}
