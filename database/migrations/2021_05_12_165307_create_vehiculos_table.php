<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->integer('robo_id');
            $table->integer('marca_id')->nullable();
            $table->string('marca')->nullable();
            $table->integer('subMarca_id')->nullable();
            $table->string('subMarca')->nullable();
            $table->string('modelo')->nullable();
            $table->integer('color_id')->nullable();
            $table->string('color')->nullable();
            $table->string('numSerie')->nullable();
            $table->integer('tipoVehiculo_id')->nullable();
            $table->string('tipoVehiculo')->nullable();
            $table->integer('claseVehiculo_id')->nullable();
            $table->string('claseVehiculo')->nullable();
            $table->string('señas')->nullable();
            $table->integer('procedencia_id')->nullable();
            $table->string('procedencia')->nullable();
            $table->string('aseguradora')->nullable();
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
        Schema::dropIfExists('vehiculos');
    }
}
