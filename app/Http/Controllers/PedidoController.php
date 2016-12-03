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
        return view('cliente.index' ,['clientes' => $clientes , 'pedido' => $pedido]);
    }

    public function addCliente()
    {        
        $pedido   = 'pedido';
        return view('cliente.create' ,['pedido' => $pedido]);
    }

    public function create(Request $request)
    {
        $cliente        = Cliente::find($request['cliente']);
        $entregadores   = Entregador::where('ativo' , '=' , '1')->get();
        $produtos       = Produto::where('ativo' , '=' , '1')->get();
        return view('pedido.create' ,['cliente' => $cliente , 'entregadores' => $entregadores , 'produtos' => $produtos]);    
    }

    public function store(Request $request)
    { 
//die($request);
        //$this->validate($request,['entregador'   =>  'not_in:0',   ]);   
        if($request['entregador'] == 0)
        {
            $cliente        = Cliente::find($request['clienteid']);
            $entregadores   = Entregador::where('ativo' , '=' , '1')->get();
            $produtos       = Produto::where('ativo' , '=' , '1')->get();
            echo "<script>alert('Selecione o entregador.');</script>";         
            return view('pedido.create' ,['cliente' => $cliente , 'entregadores' => $entregadores , 'produtos' => $produtos]);   

        }elseif(!isset($request["produtos"] ))
        {
            $cliente        = Cliente::find($request['clienteid']);
            $entregadores   = Entregador::where('ativo' , '=' , '1')->get();
            $produtos       = Produto::where('ativo' , '=' , '1')->get();
            echo "<script>alert('Selecione os produtos.');</script>";         
            return view('pedido.create' ,['cliente' => $cliente , 'entregadores' => entregadores , 'produtos' => $produtos]);    
        }

        $pedido = new Pedido();
        $pedido->ativo          = 0;
        $pedido->status_id      = 1;
        $pedido->taxaEntrega    = 5;
        $pedido->valorEntregue  = 0;
        $pedido->troco          = 0;
        $pedido->cliente_id     = $request['clienteid'];
        $pedido->entregador_id  = $request['entregador'];
        $pedido->save();

        foreach ($request["produtos"] as $campo => $valor) { 
            $produtoSel    = Produto::find($valor);
            $pedidoProduto = new PedidoProduto();   
            $pedidoProduto->pedido_id   = $pedido->id;
            $pedidoProduto->produto_id  = $valor;
            $pedidoProduto->valorItem   = $produtoSel->custo;
            $pedidoProduto->save();
        } 

        $pedido->valorTotal = $pedido->pedidoProduto->sum('valorItem') + $pedido->taxaEntrega; 
        $pedido->save();

        return view('pedido.resumoPedido' ,['pedido' => $pedido]);        
    }

    public function atualizaValores(Request $request)
    { 
        if(isset($request['item'])){
            $pedidoProduto  = PedidoProduto::find($request['item']); 
            $pedido         = Pedido::find($pedidoProduto->pedido_id);
            $valorItem      = $pedidoProduto->produto->custo * $request['quantidade'];
            $pedidoProduto->qtd       = $request['quantidade'];
            $pedidoProduto->valorItem = $valorItem;
            $pedidoProduto->save();

            $pedido->valorTotal = $pedido->pedidoProduto->sum('valorItem') + $pedido->taxaEntrega; 
            if($pedido->valorEntregue != 0){
                $pedido->troco      =  - $pedido->pedidoProduto->sum('valorItem') - $pedido->taxaEntrega  + $pedido->valorEntregue ;
            }
            $pedido->save();
        }else{            
           $pedido          = Pedido::find($request['pedido']);
           $pedido->valorEntregue    = $request['valor'];
           $pedido->troco = - $pedido->valorTotal + $request['valor'];
           $pedido->save();
            
        }  

        return view('pedido.resumoPedido' ,['pedido' =>  $pedido ]);
    }

    public function finalizar(Request $request)
    { 
        $pedidos = Pedido::orderBy('created_at','ASC')
                            ->where('ativo' , '=' , '1')
                            ->get();
        $status =   Status::all();   

        $pedido         = Pedido::find($request['pedido']);
        if($pedido->valorEntregue == 0 ){
            echo "<script>alert('Informe o valor a ser entregue pelo cliente');</script>";
            return view('pedido.resumoPedido' ,['pedido' =>  $pedido ]);
        }else{
            $pedido->ativo  = 1;
            $pedido->save();
            return Redirect::to('pedido')
                        ->with('success','Pedido cadastrado com sucesso');
        }
    }

    public function show(Request $request)
    {
        $pedido      =   Pedido::find($request['pedido']);  
        if($pedido->status_id == '1')
        {
            $status  =  Status::where('id','!=',$pedido->status_id)->get(); 
            return view('pedido.show' ,['pedido' =>  $pedido , 'status' => $status]);
        }elseif ($pedido->status_id == '2')
        {
            $status  =  Status::whereNotIn('id' , [1 , 2])->get();
            return view('pedido.show' ,['pedido' =>  $pedido , 'status' => $status]);
        }

        return view('pedido.show' ,['pedido' =>  $pedido]);
    }

    public function update(Request $request)
    {
        $pedido  = Pedido::find($request['pedido']);
        $statuss = Status::where('id' , '!=' , $pedido->status_id);
        $pedido->status_id =  $request['statusPedido'];
        $pedido->save();

        $pedidos = Pedido::orderBy('created_at','ASC')
                            ->where('ativo' , '=' , '1')
                            ->get();        
        echo "<script>alert('Pedido alterado com sucesso.');</script>";
        return view('pedido.index' ,['pedidos' =>  $pedidos]);

    }
}
