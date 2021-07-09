<?php

namespace Database\Seeders\Catalogos;

use Illuminate\Database\Seeder;
use App\Models\Modalidad;
use DB;

class ModalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Modalidad::truncate();

        $data = [
            ["modalidad_id"=>0, "descripcion"=> "SIN INFORMACION"],
            ["modalidad_id"=>1, "descripcion"=> "CON VIOLENCIA"],
            ["modalidad_id"=>2, "descripcion"=> "SIN VIOLENCIA"],
        ];

        DB::table('modalidades')->insert($data);
    }
}
