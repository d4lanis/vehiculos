<?php

namespace Database\Seeders\Catalogos;

use Illuminate\Database\Seeder;
use App\Models\Procedencia;
use DB;

class ProcedenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Procedencia::truncate();

        $data = [
            ["id"=>0, "descripcion"=> "sin informacion"],
            ["id"=>1, "descripcion"=> "nacional"],
            ["id"=>2, "descripcion"=> "extranjero"],
            ["id"=>3, "descripcion"=> "fronterizo"],
        ];

        DB::table('procedencias')->insert($data);

    }
}
