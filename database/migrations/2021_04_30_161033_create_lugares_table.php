<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLugaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up()
    {
        Schema::create('lugares', function (Blueprint $table) {
            $table->integer('lugar_id');
            $table->primary('lugar_id');
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
        Schema::dropIfExists('lugares');
    }
}
