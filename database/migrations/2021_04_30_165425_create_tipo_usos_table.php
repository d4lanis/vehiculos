<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoUsosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_usos', function (Blueprint $table) {
            $table->integer('tipoUso_id');
            $table->primary('tipoUso_id');
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
        Schema::dropIfExists('tipo_usos');
    }
}
