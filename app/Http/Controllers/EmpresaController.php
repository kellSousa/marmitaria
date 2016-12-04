<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Redirect;
use Auth;
use App\Empresa;

class EmpresaController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $empresas = Empresa::orderBy('nome','ASC')
                        ->where('nome', 'like', '%'.$request->get('pesq').'%')
                        ->orwhere('cnpj', 'like', '%'.$request->get('pesq').'%')
                        ->orwhere('endereco', 'like', '%'.$request->get('pesq').'%')
                        ->orwhere('telefone', 'like', '%'.$request->get('pesq').'%')
                        ->get();

        foreach ($empresas as $empresas2) {
            if($empresas2->ativo == 1) {
                $var[] = $empresas2;
            }                          
        }
        if(isset($var)){                       
            $empresas = $var;
        }else{
            $empresas = [];
        }
        return view('empresa.index' , ['empresas' => $empresas]);       
    }

    public function create()
    {
         return view('empresa.create' );
    }

    public function store(Request $request)
    {
         $this->validate($request, [
            'nome'     => 'required|min:5',
            'cnpj'     => 'required|cnpj|unique:empresa',
            'endereco' => 'required',
            'telefone' => 'required|dddtelefone',
            'email'    => 'required|email|unique:empresa',
        ]);
        $empresa = new Empresa;
        $empresa->nome      = $request['nome'];
        $empresa->cnpj      = $request['cnpj'];
        $empresa->endereco  = $request['endereco'];
        $empresa->telefone  = $request['telefone'];
        $empresa->email     = $request['email'];
        $empresa->save();
        return Redirect::to('empresa')
                        ->with('success','Empresa cadastrado com sucesso');
    }

    public function show(Request $request)
    {
        $empresa = Empresa::find($request->empresa);
        return view('empresa.show' , ['empresa' => $empresa]);
    }

    public function edit(Request $request)
    {
        $empresa = Empresa::find($request->empresa);
        return view('empresa.edit' , ['empresa' => $empresa]);
    }

    public function addEntregador(Request $request)
    {
        $empresas = Empresa::where('id' , '=' , $request['empresa'])->get();
        return view('entregador.create' , ['empresas' => $empresas]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
                'nome'     => 'required|min:5',
                'cnpj'     => 'required|cnpj|unique:empresa,cnpj,'.$request->empresa,
                'endereco' => 'required',
                'telefone' => 'required|dddtelefone',
                'email'    => 'required|email|unique:empresa,email,'.$request->empresa,
            ]);
        $empresa = Empresa::find($request->empresa);
        $empresa->nome      = $request['nome'];
        $empresa->cnpj      = $request['cnpj'];
        $empresa->endereco  = $request['endereco'];
        $empresa->telefone  = $request['telefone'];
        $empresa->email     = $request['email'];
        $empresa->save();
        return Redirect::to('empresa')
                        ->with('success','Empresa alterada com sucesso');
    }

    public function delete(Request $request)
    {
        $empresa = Empresa::find($request->empresa);       
        if($empresa->entregador()){             
            foreach ($empresa->entregador()->get() as $entregador) {
                if($entregador->ativo == '1'){
                    $var[] = $entregador->nome;
                }
            }           
        }
        if(isset($var)){
            $entregadores   = implode(",", $var);
            return Redirect::to('empresa')
                        ->with('erro' , 'A empresa '.$empresa->nome.' não pode der deletada, pois existem entregadores ativos vinculados a ela: '.$entregadores);
        }           
        $empresa->ativo  = '0';
        $empresa->save();
        return Redirect::to('empresa')
                        ->with('success' , 'A empresa '.$empresa->nome.' foi deletada com sucesso.');
    }

}

