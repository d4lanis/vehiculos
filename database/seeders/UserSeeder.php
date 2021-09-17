<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Daniel (Admin)',
            'email'=>'daniel.alanis.hdz@gmail.com',
            'password'=>bcrypt('Aa061998.')
        ])->assignRole('Admin');
        
        User::create([
            'name'=>'Daniel (Capturista)',
            'email'=>'rodan.mega@gmail.com',
            'password'=>bcrypt('Aa061998.')
        ])->assignRole('Capturista');
    }
}
