<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produto';
	public function tamanhoProduto()
    {
        return $this->belongsTo('App\TamanhoProduto', 'tamanhoProduto_id' , 'id');
    }
    public function pedidoProduto()
    {
        return $this->hasMany('App\PedidoProduto', 'produto_id' , 'id');
    }
}
