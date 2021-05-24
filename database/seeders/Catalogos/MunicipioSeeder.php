<?php

namespace Database\Seeders\Catalogos;

use Illuminate\Database\Seeder;
use App\Models\Municipio;
use DB;

class MunicipioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Municipio::truncate();
        $path = '/home/alanis/Escritorio/Ejercicio1/output/municipios.sql';
        $sql = file_get_contents($path);
        DB::unprepared($sql);
    }
}
