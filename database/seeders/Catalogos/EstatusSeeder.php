<?php

namespace Database\Seeders\Catalogos;

use Illuminate\Database\Seeder;
use App\Models\Estatus;
use DB;

class EstatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Estatus::truncate();

        $data = [
            ["estatus_id"=>0, "descripcion"=> "ELEVADO"],
            ["estatus_id"=>1, "descripcion"=> "SIN ELEVAR"],
            
        ];

        DB::table('estatus')->insert($data);
    }
}
