<?php

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->delete();
        $status = array(
                array(
                    'id'    =>  1,
                    'nome'  =>  'Pendente',
                    'descricao' =>  'Quando o atendente da entrada no pedido.',
                ),
                array(
                    'id'    =>  2,
                    'nome'  =>  'Em trânsito',
                    'descricao' =>  'Quando o motoboy retira o pedido para a entrega.',
                ),
                array(
                    'id'    =>  3,
                    'nome'  =>  'Cancelado',
                    'descricao' =>  'Quando surge alguma irregularidade e o pedido não pode ser
entregue.',
                ),
                array(
                    'id'    =>  4,
                    'nome'  =>  'Entregue',
                    'descricao' =>  'Quando o motoboy conclui a entrega e apresenta o pagamento.',
                ),
        );

        DB::table('status')->insert($status);
    }
}
