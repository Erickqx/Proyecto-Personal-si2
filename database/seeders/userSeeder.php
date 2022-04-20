<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $user=new User() ;
        $user->name='admin';
        $user->email='admin@gmail.com';
        $user->password=bcrypt('1234');
        $user->assignRole('Administrador');//bcrypt encripta la contraseña 
        $user->save();//save con

        $user=new User() ;
        $user->name='Paciente';
        $user->email='paciente@gmail.com';
        $user->password=bcrypt('1234');
        $user->assignRole('Paciente');//bcrypt encripta la contraseña 
        $user->save();//save con

        $user=new User() ;
        $user->name='Medico Montalvo';
        $user->email='medico@gmail.com';
        $user->password=bcrypt('1234');
        $user->assignRole('Medico');//bcrypt encripta la contraseña 
        $user->save();//save con


    }
}
