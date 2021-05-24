<?php

namespace Database\Seeders\Catalogos;

use Illuminate\Database\Seeder;
use App\Models\Marca;
use DB;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Marca::truncate();
        $path = '/home/alanis/Escritorio/Ejercicio1/output/marcas.sql';
        $sql = file_get_contents($path);
        DB::unprepared($sql);
    }
}
