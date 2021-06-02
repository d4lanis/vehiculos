<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDenunciantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('denunciantes', function (Blueprint $table) {
            $table->id();
            $table->integer('robo_id');
            $table->string('nombre')->nullable();
            $table->string('paterno')->nullable();
            $table->string('materno')->nullable();
            $table->string('rfc')->nullable();
            $table->string('curp')->nullable();
            $table->string('licencia')->nullable();
            $table->string('pasaporte')->nullable();
            $table->string('telefono')->nullable();
            $table->string('correo')->nullable();
            $table->string('domicilio')->nullable();
            $table->string('numExterior')->nullable();
            $table->string('numInterior')->nullable();
            $table->string('colonia')->nullable();
            $table->integer('codigoPostal')->nullable();
            $table->integer('entidad_id')->nullable();
            $table->string('entidad')->nullable();
            $table->integer('municipio_id')->nullable();
            $table->string('municipio')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('denunciantes');
    }
}
