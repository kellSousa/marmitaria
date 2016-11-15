<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedido';
	public function cliente()
    {
        return $this->belongsTo('App\Cliente', 'cliente_id' , 'id');
    }
    public function status()
    {
        return $this->belongsTo('App\Status', 'status_id' , 'id');
    }
    public function entregador()
    {
        return $this->belongsTo('App\Entregador', 'entregador_id' , 'id');
    }
}
