<?php

namespace Database\Seeders\Catalogos;

use Illuminate\Database\Seeder;
use App\Models\Colores;
use DB;

class ColoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Colores::truncate();

        $data = [
            ["id"=>0, "descripcion"=> "sin informacion"],
            ["id"=>1, "descripcion"=> "rojo claro"],
            ["id"=>2, "descripcion"=> "rojo claro metalico"],
            ["id"=>3, "descripcion"=> "rojo medio"],
            ["id"=>4, "descripcion"=> "rojo medio metalico"],
            ["id"=>5, "descripcion"=> "rojo obscuro"],
            ["id"=>6, "descripcion"=> "rojo obscuro metalico"],
            ["id"=>7, "descripcion"=> "azul claro"],
            ["id"=>8, "descripcion"=> "azul claro metalico"],
            ["id"=>9, "descripcion"=> "azul medio"],
            ["id"=>10, "descripcion"=> "azul medio metalico"],
            ["id"=>11, "descripcion"=> "azul obscuro"],
            ["id"=>12, "descripcion"=> "azul obscuro metalico"],
            ["id"=>13, "descripcion"=> "beige/crema claro"],
            ["id"=>14, "descripcion"=> "beige/crema claro metalico"],
            ["id"=>15, "descripcion"=> "beige/crema medio"],
            ["id"=>16, "descripcion"=> "beige/crema medio metalico"],
            ["id"=>17, "descripcion"=> "beige/crema obscuro"],
            ["id"=>18, "descripcion"=> "beige/crema obscuro metalico"],
            ["id"=>19, "descripcion"=> "amarillo claro"],
            ["id"=>20, "descripcion"=> "amarillo claro metalico"],
            ["id"=>21, "descripcion"=> "amarillo medio"],
            ["id"=>22, "descripcion"=> "amarillo medio metalico"],
            ["id"=>23, "descripcion"=> "amarillo obscuro"],
            ["id"=>24, "descripcion"=> "amarillo obcuro metalico"],
            ["id"=>25, "descripcion"=> "gris claro"],
            ["id"=>26, "descripcion"=> "gris claro metalico"],
            ["id"=>27, "descripcion"=> "gris medio"],
            ["id"=>28, "descripcion"=> "gris medio metalico"],
            ["id"=>29, "descripcion"=> "gris obscuro"],
            ["id"=>30, "descripcion"=> "gris obscuro metalico"],
            ["id"=>31, "descripcion"=> "rosa claro"],
            ["id"=>32, "descripcion"=> "rosa claro metalico"],
            ["id"=>33, "descripcion"=> "rosa medio"],
            ["id"=>34, "descripcion"=> "rosa medio metalico"],
            ["id"=>35, "descripcion"=> "rosa obscuro"],
            ["id"=>36, "descripcion"=> "rosa obscuro metalico"],
            ["id"=>37, "descripcion"=> "morado claro"],
            ["id"=>38, "descripcion"=> "morado claro metalico"],
            ["id"=>39, "descripcion"=> "morado medio"],
            ["id"=>40, "descripcion"=> "morado medio metalico"],
            ["id"=>41, "descripcion"=> "morado obscuro"],
            ["id"=>42, "descripcion"=> "morado obscuro metalico"],
            ["id"=>43, "descripcion"=> "naranja claro"],
            ["id"=>44, "descripcion"=> "naranja claro metalico"],
            ["id"=>45, "descripcion"=> "naranja medio"],
            ["id"=>46, "descripcion"=> "naranja medio metalico"],
            ["id"=>47, "descripcion"=> "naranja obscuro"],
            ["id"=>48, "descripcion"=> "naranja obscuro metalico"],
            ["id"=>49, "descripcion"=> "verde claro"],
            ["id"=>50, "descripcion"=> "verde claro metalico"],
            ["id"=>51, "descripcion"=> "verde medio"],
            ["id"=>52, "descripcion"=> "verde medio metalico"],
            ["id"=>53, "descripcion"=> "verde obscuro"],
            ["id"=>54, "descripcion"=> "verde obscuro metalico"],
            ["id"=>55, "descripcion"=> "dorado claro"],
            ["id"=>56, "descripcion"=> "dorado claro metalico"],
            ["id"=>57, "descripcion"=> "dorado medio"],
            ["id"=>58, "descripcion"=> "dorado medio metalico"],
            ["id"=>59, "descripcion"=> "dorado obscuro"],
            ["id"=>60, "descripcion"=> "dorado obscuro metalico"],
            ["id"=>61, "descripcion"=> "plata claro"],
            ["id"=>62, "descripcion"=> "plata claro metalico"],
            ["id"=>63, "descripcion"=> "plata medio"],
            ["id"=>64, "descripcion"=> "plata medio metalico"],
            ["id"=>65, "descripcion"=> "plata obscuro"],
            ["id"=>66, "descripcion"=> "plata obscuro metalico"],
            ["id"=>67, "descripcion"=> "cafe claro"],
            ["id"=>68, "descripcion"=> "cafe claro metalico"],
            ["id"=>69, "descripcion"=> "cafe medio"],
            ["id"=>70, "descripcion"=> "cafe medio metalico"],
            ["id"=>71, "descripcion"=> "cafe obscuro"],
            ["id"=>72, "descripcion"=> "cafe obscuro metalico"],
            ["id"=>73, "descripcion"=> "vino/guinda claro"],
            ["id"=>74, "descripcion"=> "vino/guinda claro metalico"],
            ["id"=>75, "descripcion"=> "vino/guinda medio"],
            ["id"=>76, "descripcion"=> "vino/guinda medio metalico"],
            ["id"=>77, "descripcion"=> "vino/guinda obscuro"],
            ["id"=>78, "descripcion"=> "vino/guinda obscuro metalico"],
            ["id"=>79, "descripcion"=> "cobre claro"],
            ["id"=>80, "descripcion"=> "cobre claro metalico"],
            ["id"=>81, "descripcion"=> "cobre medio"],
            ["id"=>82, "descripcion"=> "cobre medio metalico"],
            ["id"=>83, "descripcion"=> "cobre obscuro"],
            ["id"=>85, "descripcion"=> "negro"],
            ["id"=>86, "descripcion"=> "blanco"],
        ];

        DB::table('colores')->insert($data);

    }
}
