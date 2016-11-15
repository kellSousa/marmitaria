<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelaProduto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto' , function(Blueprint $table){
            $table->increments('id');
            $table->string('nome');
            $table->string('descricao');
            $table->integer('tamanhoProduto_id')->unsigned();
            $table->foreign('tamanhoProduto_id')->references('id')->on('tamanhoProduto');
$table->float('custo', 6 , 2);
            $table->boolean('ativo')->default(true);
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
        Schema::drop('produto');
    }
}
