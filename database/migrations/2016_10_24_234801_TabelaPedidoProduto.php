<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelaPedidoProduto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidoproduto', function(Blueprint $table){
            $table->increments('id');
            $table->integer('pedido_id')->unsigned();
            $table->foreign('pedido_id')->references('id')->on('pedido');
            $table->integer('produto_id')->unsigned();
            $table->foreign('produto_id')->references('id')->on('produtO');
            $table->integer('qtd')->default(1);
            $table->float('valorItem', 6 , 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pedidoproduto');
    }
}
