<?php

namespace Database\Seeders\Catalogos;

use Illuminate\Database\Seeder;
use App\Models\Submarca;
use DB;

class SubmarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        SubMarca::truncate();
        $path = '/home/alanis/Escritorio/Ejercicio1/output/submarcas.sql';
        $sql = file_get_contents($path);
        DB::unprepared($sql);
    }
}
