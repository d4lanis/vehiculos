<?php

namespace Database\Seeders\Catalogos;

use Illuminate\Database\Seeder;
use App\Models\Entidad;
use DB;

class EntidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Entidad::truncate();
        $path = '/home/alanis/Escritorio/Ejercicio1/output/entidades.sql';
        $sql = file_get_contents($path);
        DB::unprepared($sql);
    }
}
