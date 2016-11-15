<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';
	public function pedido()
    {
        return $this->hasMany('App\Pedido', 'status_id' , 'id');
    }
}
