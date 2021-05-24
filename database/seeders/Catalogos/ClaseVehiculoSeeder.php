<?php

namespace Database\Seeders\Catalogos;

use Illuminate\Database\Seeder;
use App\Models\ClaseVehiculo;
use DB;

class ClaseVehiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ClaseVehiculo::truncate();

        $data= [
            ["claseVehiculo_id"=>0,"descripcion"=>"SIN INFORMACION"],
            ["claseVehiculo_id"=>1,"descripcion"=>"AUTOMOVIL"],
            ["claseVehiculo_id"=>2,"descripcion"=>"CAMIONETA"],
            ["claseVehiculo_id"=>3,"descripcion"=>"CAMION"],
            ["claseVehiculo_id"=>4,"descripcion"=>"OMNIBUS"],
            ["claseVehiculo_id"=>5,"descripcion"=>"REMOLQUE"],
            ["claseVehiculo_id"=>6,"descripcion"=>"MOTOCICLETA"],
            ["claseVehiculo_id"=>7,"descripcion"=>"OTROS"],
            ["claseVehiculo_id"=>8,"descripcion"=>"AUTO ANTIGUO"],
            ["claseVehiculo_id"=>9,"descripcion"=>"AGROINDUSTRIAL"],
        ];

        DB::table('clase_vehiculos')->insert($data);
    }
}
