<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NivelUsuario extends Model
{
    protected $table = 'nivelusuario';
	public function user()
    {
        return $this->hasMany('App\User', 'nivelusuario_id' , 'id');
    }
}
