<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Redirect;
use Auth;
use App\Cliente;

class ClienteController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $clientes = Cliente::orderBy('nome','ASC')
                        ->where('nome', 'like', '%'.$request->get('pesq').'%')
                        ->orwhere('telefone', 'like', '%'.$request->get('pesq').'%')
                        ->orwhere('endereco', 'like', '%'.$request->get('pesq').'%')
                        ->get();

        foreach ($clientes as $clientes2) {
            if($clientes2->ativo == 1) {
                $var[] = $clientes2;
            }                          
        }
        if(isset($var)){                       
            $clientes = $var;
        }else{
            $clientes = [];
        }
        return view('cliente.index' , ['clientes' => $clientes]);
    }

    public function create()
    {
        return view('cliente.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nome'              =>  'required|min:5',
            'telefone'          =>  'required|dddcelular|unique:cliente',
            'endereco'          =>  'required|min:5',
            'pontoReferencia'   =>  'required|min:5',
            'dtNasc'            => 'required|date2',
        ]);
        $cliente = new Cliente;
        $cliente->nome              = $request['nome'];
        $cliente->telefone          = $request['telefone'];
        $cliente->endereco          = $request['endereco'];
        $cliente->pontoReferencia   = $request['pontoReferencia'];
        $cliente->dtNasc            = $request['dtNasc'];
        $cliente->save();

        if($request['pedido'] == '1'){
            return Redirect::to('pedido/create/'.$cliente->id);
        }else{
            return Redirect::to('cliente')
                            ->with('success' , 'Cliente cadastrado com sucesso');
        }                            
    }

    public function show(Request $request)
    {
        $cliente = Cliente::find($request->cliente);
        return view('cliente.show' , ['cliente' => $cliente]);
    }

    public function edit(Request $request)
    {
        $cliente = Cliente::find($request->cliente);
        return view('cliente.edit' , ['cliente' => $cliente]);
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'nome'              =>  'required|min:5',
            'telefone'          =>  'required|dddcelular|unique:cliente,telefone,'.$request->cliente,
            'endereco'          =>  'required|min:5',
            'pontoReferencia'   =>  'required|min:5',
            'dtNasc'            =>  'required|date2',
        ]);
        $cliente =  Cliente::find($request->cliente);
        $cliente->nome              = $request['nome'];
        $cliente->telefone          = $request['telefone'];
        $cliente->endereco          = $request['endereco'];
        $cliente->pontoReferencia   = $request['pontoReferencia'];
        $cliente->dtNasc            = $request['dtNasc'];
        $cliente->save();

        return Redirect::to('cliente')
                            ->with('success' , 'Cliente alterado com sucesso');
    }

    public function delete(Request $request)
    {
        $cliente =  Cliente::find($request->cliente);
        //se tiver algum pedido pendente para esse cliente, ele n pode ser desativado
        if($cliente->pedido()){             
            foreach ($cliente->pedido()->get() as $pedido) {
                if($pedido->ativo == '1' && $pedido->status_id == 1){
                    $var[] = $pedido->id;
                }
            }           
        }
        if(isset($var)){
            return Redirect::to('cliente')
                        ->with('erro' , 'O cliente '.$cliente->nome.' não pode der deletada, pois existem pedido(s) pendente(s) vinculados a ele');
        } 
        $cliente->ativo      = 0;
        $cliente->save();
        return Redirect::to('cliente')
                            ->with('success' , 'Cliente deletado com sucesso');
    }
}
