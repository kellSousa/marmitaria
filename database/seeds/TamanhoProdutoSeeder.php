<?php

use Illuminate\Database\Seeder;

class TamanhoProdutoSeeder extends Seeder
{
    public function run()
    {        
        DB::table('tamanhoproduto')->delete();
        $tamanhoProduto = array(
                array(
                    'id'    =>  1,
                    'nome'  =>  'Pequeno',
                    'descricao' =>  'Pequeno.',
                ),
                array(
                    'id'    =>  2,
                    'nome'  =>  'Médio',
                    'descricao' =>  'Médio.',
                ),
                array(
                    'id'    =>  3,
                    'nome'  =>  'Grande',
                    'descricao' =>  'Grande.',
                ),
        );

        DB::table('tamanhoproduto')->insert($tamanhoProduto);
    }
}
