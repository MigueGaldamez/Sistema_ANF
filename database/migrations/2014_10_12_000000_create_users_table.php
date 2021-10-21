<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::create('tipoEmpresa', function (Blueprint $table) {
            $table->increments('idTipoEmpresa');
            $table->string('nombre');
            $table->timestamps();
        });
        Schema::create('empresa', function (Blueprint $table) {
            $table->increments('idEmpresa');
            $table->string('nombreEmpresa');
            $table->integer('idTipoEmpresa')->unsigned();
            $table->foreign('idTipoEmpresa')->references('idTipoEmpresa')->on('tipoEmpresa');
            $table->timestamps();
        });
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('idEmpresa')->unsigned();
            $table->foreign('idEmpresa')->references('idEmpresa')->on('empresa');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
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
        Schema::dropIfExists('tipoEmpresa');
        Schema::dropIfExists('empresa');
        Schema::dropIfExists('users');
    }
}
