<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TamanhoProduto extends Model
{
    protected $table = 'tamanhoproduto';
	public function pedido()
    {
        return $this->hasMany('App\Produto', 'tamanhoProduto_id' , 'id');
    }
}
