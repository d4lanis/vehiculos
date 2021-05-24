<?php

namespace Database\Seeders\Catalogos;

use Illuminate\Database\Seeder;
use App\Models\TipoVehiculo;
use DB;

class TipoVehiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        TipoVehiculo::truncate();
        $path = '/home/alanis/Escritorio/Ejercicio1/output/tipoVehiculos.sql';
        $sql = file_get_contents($path);
        DB::unprepared($sql);
    }
}
