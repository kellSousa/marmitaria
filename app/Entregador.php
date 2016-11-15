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
}
