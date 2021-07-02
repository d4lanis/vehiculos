<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call( Catalogos\ProcedenciaSeeder::class);
        $this->call( Catalogos\ColoresSeeder::class);
        $this->call( Catalogos\MunicipioSeeder::class);
        $this->call( Catalogos\ClaseVehiculoSeeder::class);
        $this->call( Catalogos\TipoUsoSeeder::class);
        $this->call( Catalogos\MarcaSeeder::class); 
        $this->call( Catalogos\SexoDenuncianteSeeder::class);
        $this->call( Catalogos\TipoVehiculoSeeder::class);
        $this->call( Catalogos\TipoVehiculoSeeder::class);
        $this->call( Catalogos\SubmarcaSeeder::class);
        $this->call( Catalogos\EntidadSeeder::class);
        $this->call( Catalogos\LugarSeeder::class);
        $this->call( Catalogos\LocalidadSeeder::class);
        $this->call( Catalogos\EstatusSeeder::class);
    }
}
