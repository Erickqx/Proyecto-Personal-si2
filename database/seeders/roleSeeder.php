<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $role1= Role::create(['name'=>'Administrador']);
       $role2= Role::create(['name'=>'Secretaria']);
       $role3= Role::create(['name'=>'Chofer']);
       permission::create(['name'=>'Gestionar Perfil'])->syncRoles([$role1, $role3]) ;
       permission::create(['name'=>'Roles'])->syncRoles([$role1, $role3]) ;

        //
    }
}
