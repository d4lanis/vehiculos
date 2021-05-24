<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClaseVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clase_vehiculos', function (Blueprint $table) {
            $table->integer('claseVehiculo_id');
            $table->primary('claseVehiculo_id');
            $table->string('descripcion');
            /*$table->timestamps();
            $table->softDeletes();
            Campo no incluidos porque los catalogos no se van a modificar
            */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clase_vehiculos');
    }
}
