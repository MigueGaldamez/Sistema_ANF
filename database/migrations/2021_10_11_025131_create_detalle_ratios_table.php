<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleRatiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comportamiento', function (Blueprint $table) {
            $table->increments('idComportamiento');
            $table->string('nombreComportamiento');
            $table->timestamps();
        });
        Schema::create('detalleRatio', function (Blueprint $table) {
            $table->increments('idDetalleRatio');
            $table->year('anio');
            $table->decimal('valorRatio',8,2);
            $table->integer('idRatio')->unsigned();
            $table->foreign('idRatio')->references('idRatio')->on('ratio');
            $table->integer('idEmpresa')->unsigned();
            $table->foreign('idEmpresa')->references('idEmpresa')->on('empresa');
            $table->integer('idComportamiento')->unsigned();
            $table->foreign('idComportamiento')->references('idComportamiento')->on('comportamiento');
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
        Schema::dropIfExists('comportamiento');
        Schema::dropIfExists('detalleRatio');
    }
}
