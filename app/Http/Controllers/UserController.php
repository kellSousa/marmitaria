<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Redirect;
use Auth;
use App\User;
use App\NivelUsuario;

class UserController extends Controller
{
	public function __construct(){
      $this->middleware('auth');
    }

    public function register(){
        $cargos = NivelUsuario::all();
        return view('auth.register', ['cargos' => $cargos]);
    }


    public function store(Request $request)
    {

         $this->validate($request, [
            'name'            => 'required|max:255',
            'email'           => 'required|email|max:255|unique:users',
            'nivelusuario_id' => 'required|not_in:0',
            'password'        => 'required|min:6|confirmed',
        ]);
        $user = new User;
		$user->name            =  $request['name'];
		$user->email           =  $request['email'];
		$user->nivelusuario_id =  $request['nivelusuario_id'];
		$user->password        =  bcrypt($request['password']);
		$user->save();
		echo "<script>alert('Usuaário cadastrado com sucesso.');</script>";
        return view('auth.register');                        
    }
    
}
