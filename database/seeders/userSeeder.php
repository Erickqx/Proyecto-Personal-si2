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
        $user->cargo='Administrador';
        $user->assignRole('Administrador');//bcrypt encripta la contraseña 
        $user->save();//save con

        $user=new User() ;
        $user->name='Secretaria';//Paciente
        $user->email='Secretaria@gmail.com';//paciente@gmail.com
        $user->password=bcrypt('1234');
        $user->cargo='Secretaria';
        $user->assignRole('Secretaria');//bcrypt encripta la contraseña 
        $user->save();//save con

        $user=new User() ;
        $user->name='Chofer';//Medico Montalvo
        $user->email='Chofer@gmail.com';//medico@gmail.com
        $user->password=bcrypt('1234');
        $user->cargo='Chofer';
        $user->assignRole('Chofer');//bcrypt encripta la contraseña 
        $user->save();//save con


    }
}
