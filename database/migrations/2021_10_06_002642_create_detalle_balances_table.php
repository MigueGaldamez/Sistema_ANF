<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalleBalance', function (Blueprint $table) {
            $table->increments('idDetalleBalance');
            $table->integer('idBalance')->unsigned();
            $table->foreign('idBalance')->references('idBalance')->on('balance');
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
        Schema::dropIfExists('detalleBalance');
    }
}
