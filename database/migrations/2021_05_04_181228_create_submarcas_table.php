<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmarcasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submarcas', function (Blueprint $table) {
            $table->integer('subMarca_id');
            $table->integer('marca_id');
            $table->primary(['marca_id','subMarca_id']);
            $table->integer('tipoVehiculo_id');
            $table->integer('claseVehiculo_id');
            $table->string('descripcion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('submarcas');
    }
}
