<?php

use Illuminate\Database\Seeder;

class NivelUsuarioSeeder extends Seeder
{
    public function run(){
    	
	    DB::table('nivelusuario')->delete();
	    $nivelusuario = array(
                array(
                    'id'    =>  1,
                    'nome'  =>  'Gerente',
                    'descricao' =>  'Gerente.',
                ),
                array(
                    'id'    =>  2,
                    'nome'  =>  'Atendente',
                    'descricao' =>  'Atendente.',
                ),
        );

        DB::table('nivelusuario')->insert($nivelusuario);
    
        //
    }
}
