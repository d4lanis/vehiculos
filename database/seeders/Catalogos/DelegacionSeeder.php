<?php

namespace Database\Seeders\Catalogos;

use Illuminate\Database\Seeder;
use App\Models\Delegacion;
use DB;

class DelegacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Delegacion::truncate();

        $data = [
            ["delegacion_id"=>1, "descripcion"=> "SURESTE"],
            ["delegacion_id"=>2, "descripcion"=> "LAGUNA I"],
            ["delegacion_id"=>3, "descripcion"=> "CENTRO"],
            ["delegacion_id"=>4, "descripcion"=> "CARBONIFERA"],
            ["delegacion_id"=>5, "descripcion"=> "NORTE I"],
            ["delegacion_id"=>6, "descripcion"=> "NORTE II"],
            ["delegacion_id"=>7, "descripcion"=> "LAGUNA II"],
            ["delegacion_id"=>8, "descripcion"=> "OFICINAS CENTRALES"],
        ];

        DB::table('delegaciones')->insert($data);
    }
}
