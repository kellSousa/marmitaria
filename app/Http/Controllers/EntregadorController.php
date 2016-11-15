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
        }
        return view('entregador.index' , ['entregadores' => $entregadores]);
    }

    
    public function create($id)
    {
        if($id == 0){
            $empresas = Empresa::where('ativo' , '=' , '1')->get();
        }else{
            $empresas = Empresa::where('id' , '=' , $id)->get();
        }
        return view('entregador.create' , ['empresas' => $empresas]);
    }

    
    public function store(Request $request)
    {
        $this->validate($request,[
            'empresa'   =>  'required|not_in:0',
            'nome'      =>  'required|min:5',
            'cpf'       =>  'required|cpf|unique:entregador',
            'rg'        =>  'required|min:5',
            'celular'   => 'required|dddcelular',
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

    
    public function show($id)
    {   
        $entregador = Entregador::find($id);
        $empresa    = Empresa::find($entregador->empresa_id);
        return view('entregador.show' , ['empresa' => $empresa , 'entregador' => $entregador]); 
    }

    
    public function edit($id)
    { 
        $entregador = Entregador::find($id);
        $empresas   = Empresa::where('ativo' , '=' , '1')
                             ->where('id' , '!=', $entregador->empresa_id)
                             ->get();
       
       // $empresaSel = Empresa::find($entregador->empresa_id); 
        return view('entregador.edit' , ['empresas' => $empresas , 'entregador' => $entregador]); 
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'empresa'   =>'required|not_in:0',
            'nome'      =>  'required|min:5',
            'cpf'       => 'required|cpf|unique:entregador,cpf,'.$request->id,
            'rg'        =>  'required|min:5',
            'celular'   => 'required|dddcelular',
        ]);

        $entregador =  Entregador::find($id);
        $entregador->empresa_id = $request['empresa'];
        $entregador->nome       = $request['nome'];
        $entregador->cpf        = $request['cpf'];
        $entregador->rg         = $request['rg'];
        $entregador->celular    = $request['celular'];
        $entregador->save();

        return Redirect::to('entregador')
                            ->with('success' , 'Entregador alterado com sucesso');
    }

    
    public function delete($id)
    {
        $entregador = Entregador::find($id);
         //se tiver algum pedido pendente para esse entregador, ele n pode ser desativado
        $entregador->ativo      = 0;
        $entregador->save();
        return Redirect::to('entregador')
                            ->with('success' , 'Entregador deletado com sucesso');
    }
}
