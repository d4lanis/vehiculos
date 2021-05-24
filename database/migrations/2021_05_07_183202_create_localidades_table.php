<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localidades', function (Blueprint $table) {
            $table->integer('entidad_id');
            $table->integer('municipio_id');
            $table->integer('localidad_id');
            $table->primary(['entidad_id','municipio_id','localidad_id']);
            $table->string('nombre');
            $table->char('ambito');
            $table->string('latitud');
            $table->string('longitud');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('localidades');
    }
}
