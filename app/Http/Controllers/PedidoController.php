<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Redirect;
use Auth;
use App\Pedido;
use App\Produto;
use App\PedidoProduto;
use App\Status;
use App\Cliente;
use App\Entregador;

class PedidoController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $pedidos = Pedido::orderBy('created_at','ASC')
                            ->where('ativo' , '=' , '1')
                            ->get();
       
        return view('pedido.index' , ['pedidos' => $pedidos]);
    }

    public function selCliente()
    {
        $clientes = Cliente::where('ativo' , '=' , '1')->get();
        $pedido   = 'pedido';
        //die($pedido);
        return view('cliente.index' ,['clientes' => $clientes , 'pedido' => $pedido]);
    }

    public function addCliente()
    {        
        $pedido   = 'pedido';
        return view('cliente.create' ,['pedido' => $pedido]);
    }

    public function create($idCliente)
    {
        $cliente = Cliente::find($idCliente);
        $entregadores = Entregador::where('ativo' , '=' , '1')->get();
        $produtos = Produto::where('ativo' , '=' , '1')->get();
        return view('pedido.create' ,['cliente' => $cliente , 'entregadores' => $entregadores , 'produtos' => $produtos]);
    
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'cliente' =>'required',
            'entregador' =>'required|not_in:0'
            ]);
      
        $pedido = new Pedido();
        $pedido->ativo          = 0;
        $pedido->status_id      = 1;
        $pedido->cliente_id     = $request['clienteid'];
        $pedido->Entregador_id  = $request['entregador'];
        $pedido->save();

        foreach ($request["produtos"] as $campo => $valor) { 
            $pedidoProduto = new PedidoProduto();
            $pedidoProduto->pedido_id   = $pedido->id;
            $pedidoProduto->produto_id  = $valor;
            $pedidoProduto->save();
        }
        $pedido->ativo          = 1;
        $pedido->save();
        //die('fim');
        return Redirect::to('pedido')
                            ->with('success' , 'Produto cadastrado com sucesso');
        
    }


    public function show($id)
    {
        $pedido = Pedido::find($id);   
    }

    public function edit($id)
    {
        $pedido  = Pedido::find($id);
        $statuss = Status::where('id' , '!=' , $pedido->status_id);
    }

    public function update(Request $request, $id)
    {
        $pedido = Pedido::find($id);   
    }

    public function destroy($id)
    {
        $pedido = Pedido::find($id);       
        if($pedido->status_id == 1){    
            $empresa->status     = 3;
            $empresa->save();
            return Redirect::to('empresa')
                                ->with('success' , 'A empresa '.$empresa->nome.' foi deletada com sucesso.');
        }
        return Redirect::to('pedido')
                        ->with('erro' , 'O pedido está com status '.$pedido->status->nome);       
    }
}
