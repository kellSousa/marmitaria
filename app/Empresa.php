<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresa';
	public function entregador()
    {
        return $this->hasMany('App\Entregador', 'empresa_id' , 'id');
    }

}
