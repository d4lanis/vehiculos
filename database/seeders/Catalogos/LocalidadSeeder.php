<?php

namespace Database\Seeders\Catalogos;

use Illuminate\Database\Seeder;
use App\Models\Localidad;
use DB;

class LocalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Localidad::truncate();
        $path = '/home/alanis/Escritorio/Ejercicio1/output/localidades.sql';
        $sql = file_get_contents($path);
        DB::unprepared($sql);
    }
}
