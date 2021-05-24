<?php

namespace Database\Seeders\Catalogos;

use Illuminate\Database\Seeder;
use App\Models\Lugar;
use DB;

class LugarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Lugar::truncate();

        $data= [
            ["lugar_id"=>0, "descripcion"=>"SIN INFORMACION"],
            ["lugar_id"=>1, "descripcion"=>"VIA PUBLICA"],
            ["lugar_id"=>2, "descripcion"=>"CASA HABITACION"],
            ["lugar_id"=>3, "descripcion"=>"ESCUELA"],
            ["lugar_id"=>4, "descripcion"=>"LUGAR DE TRABAJO"],
            ["lugar_id"=>5, "descripcion"=>"CENTRO COMERCIAL"],
            ["lugar_id"=>6, "descripcion"=>"MERCADO POPULAR"],
            ["lugar_id"=>7, "descripcion"=>"CENTRAL CAMIONERA"],
            ["lugar_id"=>8, "descripcion"=>"AEROPUERTO"],
            ["lugar_id"=>9, "descripcion"=>"PARQUE PÚBLICO"],
            ["lugar_id"=>10, "descripcion"=>"SALA DE EXHIBICION"],
            ["lugar_id"=>11, "descripcion"=>"CENTRO NOCTURNO"],
            ["lugar_id"=>12, "descripcion"=>"HOTEL"],
            ["lugar_id"=>13, "descripcion"=>"NEGOCIO"],
            ["lugar_id"=>14, "descripcion"=>"METRO"],
            ["lugar_id"=>15, "descripcion"=>"CARRETERA"],
            ["lugar_id"=>16, "descripcion"=>"DESPOBLADO"],
            ["lugar_id"=>17, "descripcion"=>"ESTACIONAMIENTO PUBLICO"],
            ["lugar_id"=>18, "descripcion"=>"LUGAR PUBLICO"],
            ["lugar_id"=>19, "descripcion"=>"CLUB SOCIAL"],
            ["lugar_id"=>20, "descripcion"=>"OFICINAS PUBLICAS"],
            ["lugar_id"=>21, "descripcion"=>"PREDIO"],
            ["lugar_id"=>22, "descripcion"=>"COSTA/PLAYA"],
            ["lugar_id"=>23, "descripcion"=>"CAMINO VECINAL"],
        ];

        DB::table('lugares')->insert($data);
    }
}
