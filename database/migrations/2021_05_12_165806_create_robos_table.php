<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRobosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('robos', function (Blueprint $table) {
            $table->id();
            $table->timestamp('dateTime')->nullable();
            $table->string('calle')->nullable();
            $table->string('numExterior')->nullable();
            $table->string('localidad_id')->nullable();
            $table->string('localidad')->nullable();
            $table->integer('municipio_id')->nullable();
            $table->string('municipio')->nullable();
            $table->integer('entidad_id')->nullable();
            $table->string('entidad')->nullable();
            $table->string('codigoPostal')->nullable();
            $table->integer('tipoLugar_id')->nullable();
            $table->string('tipoLugar')->nullable();
            $table->string('descLugar')->nullable();
            $table->string('delito')->nullable();
            $table->string('armaAsociada')->nullable();
            $table->integer('estatus_id')->nullable();
            $table->string('estatus')->nullable();
            $table->string('averiguacion')->nullable();
            $table->timestamp('dateAveriguacion')->nullable();
            $table->string('agencia_mp')->nullable();
            $table->string('agente_mp')->nullable();
            $table->integer('modalidad_id')->nullable();
            $table->string('modalidad')->nullable();
            $table->string('colonia')->nullable();
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
        Schema::dropIfExists('robos');
    }
}
