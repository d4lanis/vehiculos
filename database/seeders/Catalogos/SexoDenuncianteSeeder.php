<?php

namespace Database\Seeders\Catalogos;

use Illuminate\Database\Seeder;
use App\Models\SexoDenunciante;
use DB;

class SexoDenuncianteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        SexoDenunciante::truncate();

        $data = [
            ["sexoDen_id"=>0, "descripcion"=> "sin dato"],
            ["sexoDen_id"=>1, "descripcion"=> "hombre"],
            ["sexDen_id"=>2, "descripcion"=> "mujer"],
        ];

        DB::table('sexo_denunciantes')->insert($data);
    }
}
