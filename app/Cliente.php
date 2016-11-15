<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';
	public function pedido()
    {
        return $this->hasMany('App\Pedido', 'cliente_id' , 'id');
    }
}
