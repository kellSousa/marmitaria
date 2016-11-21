<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Redirect;
use Auth;
use App\Entregador;
use App\Empresa;

class EntregadorController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $entregadores = Entregador::orderBy('nome','ASC')
                        ->where('nome', 'like', '%'.$request->get('pesq').'%')
                        ->orwhere('cpf', 'like', '%'.$request->get('pesq').'%')
                        ->orwhere('rg', 'like', '%'.$request->get('pesq').'%')
                        ->orwhere('celular', 'like', '%'.$request->get('pesq').'%')
                        ->get();

        foreach ($entregadores as $entregadores2) {
            if($entregadores2->ativo == 1) {                
                $var[] = $entregadores2;
            }                          
        }
        if(isset($var)){                       
            $entregadores = $var;
        }else{
            $entregadores = [];
        }
        return view('entregador.index' , ['entregadores' => $entregadores]);
    }

    
    public function create()
    {        
        $empresas = Empresa::where('ativo' , '=' , '1')->get();
        return view('entregador.create' , ['empresas' => $empresas]);
    }

    
    public function store(Request $request)
    {
        $this->validate($request,[
            'empresa'   =>  'required|not_in:0',
            'nome'      =>  'required|min:5',
            'cpf'       =>  'required|cpf|unique:entregador',
            'rg'        =>  'required|min:5',
            'celular'   => 'required|dddcelular|unique:entregador',
        ]);
        $entregador = new Entregador;
        $entregador->empresa_id = $request['empresa'];
        $entregador->nome       = $request['nome'];
        $entregador->cpf        = $request['cpf'];
        $entregador->rg         = $request['rg'];
        $entregador->celular    = $request['celular'];
        $entregador->save();

        return Redirect::to('entregador')
                            ->with('success' , 'Entregador cadastrado com sucesso');

    }

    
    public function show(Request $request)
    {   
        $entregador = Entregador::find($request->entregador);
        $empresa    = Empresa::find($entregador->empresa_id)->get();
        return view('entregador.show' , ['empresa' => $empresa , 'entregador' => $entregador]); 
    }

    
    public function edit(Request $request)
    { 
        $entregador = Entregador::find($request->entregador);
        $empresas   = Empresa::where('ativo' , '=' , '1')
                             ->where('id' , '!=', $entregador->empresa_id)
                             ->get();
       
       // $empresaSel = Empresa::find($entregador->empresa_id); 
        return view('entregador.edit' , ['empresas' => $empresas , 'entregador' => $entregador]); 
    }

    
    public function update(Request $request)
    {

        $this->validate($request,[
            'empresa'   =>'required|not_in:0',
            'nome'      =>  'required|min:5',
            'cpf'       => 'required|cpf|unique:entregador,cpf,'.$request->entregador,
            'rg'        =>  'required|min:5',
            'celular'   => 'required|dddcelular',
        ]);
        $entregador =  Entregador::find($request->entregador);
        $entregador->empresa_id = $request['empresa'];
        $entregador->nome       = $request['nome'];
        $entregador->cpf        = $request['cpf'];
        $entregador->rg         = $request['rg'];
        $entregador->celular    = $request['celular'];
        $entregador->save();

        return Redirect::to('entregador')
                            ->with('success' , 'Entregador alterado com sucesso');
    }

    
    public function delete(Request $request)
    {
        $entregador = Entregador::find($request->entregador);
         //se tiver algum pedido pendente para esse entregador, ele n pode ser desativado
        $entregador->ativo = '0';
        $entregador->save();
        return Redirect::to('entregador')
                            ->with('success' , 'Entregador deletado com sucesso');
    }
}
