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

        Permission::create(['name'=>'vehiculos_robados.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'vehiculos_robados.create'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'vehiculos_robados.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'vehiculos_robados.show'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'vehiculos_robados.delete']);
        Permission::create(['name'=>'admin.catalogos.index'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.catalogos.catalogo'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.catalogos.child'])->syncRoles([$role1]);
    }
}
