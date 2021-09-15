<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name'=>'Admin']);
        $role2 = Role::create(['name'=>'Capturista']);

        Permission::create('name','vehiculos_robados.index');
        Permission::create('name','vehiculos_robados.create');
        Permission::create('name','vehiculos_robados.edit');
        Permission::create('name','vehiculos_robados.show');

        Permission::create('name','admin.catalogos.index');
        Permission::create('name','admin.catalogos.catalogo');
        Permission::create('name','admin.catalogos.child');
        
        
    }
}
