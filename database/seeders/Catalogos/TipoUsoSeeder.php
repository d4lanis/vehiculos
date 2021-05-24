<?php

namespace Database\Seeders\Catalogos;

use Illuminate\Database\Seeder;
use App\Models\TipoUso;
Use DB;

class TipoUsoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Tipouso::truncate();

        $data = [
            ["tipoUSo_id"=>0,"descripcion"=>"SIN INFORMACION"],
            ["tipoUSo_id"=>1,"descripcion"=>"SERVICIO FEDERAL DE CARGA"],
            ["tipoUSo_id"=>2,"descripcion"=>"SERVICIO FEDERAL DIPLOMATICO"],
            ["tipoUSo_id"=>3,"descripcion"=>"TRANSPORTE PARTICULAR DEMOSTRA"],
            ["tipoUSo_id"=>4,"descripcion"=>"TRANSPORTE PARTICULAR DISCAPAC"],
            ["tipoUSo_id"=>5,"descripcion"=>"SERVICIO FEDERAL DISCAPACITADO"],
            ["tipoUSo_id"=>6,"descripcion"=>"SERVICIO FEDERAL TRANSFRONTERI"],
            ["tipoUSo_id"=>7,"descripcion"=>"SERVICIO FEDERAL PAQUETERIA"],
            ["tipoUSo_id"=>8,"descripcion"=>"TRANSPORTE PARTICULAR"],
            ["tipoUSo_id"=>9,"descripcion"=>"SERVICIO PUBLICO METROPOLITANO"],
            ["tipoUSo_id"=>10,"descripcion"=>"SERVICIO PUBLICO LOCAL"],
            ["tipoUSo_id"=>11,"descripcion"=>"SERVICIO PUBLICO LOCAL FRONTER"],
            ["tipoUSo_id"=>12,"descripcion"=>"TRANSPORTE PARTICULAR FRONTERI"],
            ["tipoUSo_id"=>13,"descripcion"=>"SERVICIO FEDERAL DE SEGURIDAD"],
            ["tipoUSo_id"=>14,"descripcion"=>"TRANSPORTE PARTICULAR CARGA"],
            ["tipoUSo_id"=>15,"descripcion"=>"SERVICIO LOCAL PAQUETERIA"],
            ["tipoUSo_id"=>16,"descripcion"=>"SERVICIO PUBLICO FEDERAL"],
            ["tipoUSo_id"=>17,"descripcion"=>"SERVICIO LOCAL ARRENDAMIENTO"],
            ["tipoUSo_id"=>18,"descripcion"=>"SERVICIO FEDERAL ARRENDAMINETO"],
            ["tipoUSo_id"=>19,"descripcion"=>"TRANSPORTE ESPECIALIZADO FEDER"],
            ["tipoUSo_id"=>20,"descripcion"=>"TRANSPORTE ESPECIALIZADO LOCAL"],
            ["tipoUSo_id"=>21,"descripcion"=>"SERVICIO LOCAL DE CARGA"],
        ];

        DB::table('tipo_usos')->insert($data);

    }
}
