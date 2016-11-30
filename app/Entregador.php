<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entregador extends Model
{
    protected $table = 'entregador';
	public function empresa()
    {
        return $this->belongsTo('App\Empresa', 'empresa_id' , 'id');
    }
    public function pedido()
    {
        return $this->hasMany('App\Pedido', 'entregador_id' , 'id');
    }
}
