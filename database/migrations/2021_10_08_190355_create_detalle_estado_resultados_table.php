<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleEstadoResultadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalleEstadoResultado', function (Blueprint $table) {
            $table->increments('idDetalleEstadoResultado');
            $table->integer('idEstadoResultado')->unsigned();
            $table->foreign('idEstadoResultado')->references('idEstadoResultado')->on('estadoResultado');
            $table->integer('idCuenta')->unsigned();
            $table->foreign('idCuenta')->references('idCuenta')->on('cuenta');           
            $table->decimal('saldo',8,2);
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
        Schema::dropIfExists('detalleEstadoResultado');
    }
}
