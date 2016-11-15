<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();
        $users = array(
                array(
                    'id'    =>  1,
                    'name'  =>  'Gerente',
                    'email' =>  'gerente@gmail.com',
                    'password'=> bcrypt('123456'),
                    'nivelusuario_id' => '1',
                    'remember_token' => Str::random(60),
          		),
          		array(
                    'id'    =>  2,
                    'name'  =>  'Atendente',
                    'email' =>  'atendente@gmail.com',
                    'password'=> bcrypt('123456'),
                    'nivelusuario_id' => '2',
                    'remember_token' => Str::random(60),
          		),
            );

        DB::table('users')->insert($users);
    }
}
