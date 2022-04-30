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
       $role2= Role::create(['name'=>'Paciente']);
       $role3= Role::create(['name'=>'Medico']);
       permission::create(['name'=>'Gestionar Perfil'])->syncRoles([$role1, $role3 , $role2]) ;
       permission::create(['name'=>'Roles'])->syncRoles([$role1, $role3]) ;

        //
    }
}
