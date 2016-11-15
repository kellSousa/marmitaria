<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Redirect;
use Auth;
use App\Produto;
use App\TamanhoProduto;

class ProdutoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $produtos = Produto::orderBy('nome','ASC')
                        ->where('nome', 'like', '%'.$request->get('pesq').'%')
                        ->orwhere('descricao', 'like', '%'.$request->get('pesq').'%')
                        ->get();

        foreach ($produtos as $produtos2) {
            if($produtos2->ativo == 1) {
                $var[] = $produtos2;
            }                          
        }
        if(isset($var)){                       
            $produtos = $var;
        }
        return view('produto.index' , ['produtos' => $produtos]);
    }

    public function create()
    {
        $tamanhos = TamanhoProduto::all();
        return view('produto.create' , ['tamanhos' => $tamanhos]);
    }

    public function store(Request $request)
    {
       $this->validate($request,[
            'nome'      =>  'required|min:5|unique:produto',
            'descricao' =>  'required|min:10',
            'tamanho'   =>  'required|not_in:0',
            'valor'     =>  'required|max:6',
        ]);
        $produto = new Produto;
        $produto->nome              = $request['nome'];
        $produto->descricao         = $request['descricao'];
        $produto->tamanhoProduto_id = $request['tamanho'];
        $produto->custo             = $request['valor'];
        $produto->save();

        return Redirect::to('produto')
                            ->with('success' , 'Produto cadastrado com sucesso');
    }

    public function show($id)
    {
        $produto = Produto::find($id);
        return view('produto.show' , ['produto' => $produto]);
    }

    public function edit($id)
    {
        $produto  = Produto::find($id);
        $tamanhos = TamanhoProduto::where('id' , '!=', $produto->tamanhoProduto_id)->get();
        return view('produto.edit' , ['produto' => $produto , 'tamanhos' => $tamanhos]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nome'       => 'required|min:5|unique:produto,nome,'.$request->id,
            'descricao' =>  'required|min:10',
            'tamanho'   =>  'required|not_in:0',
            'valor'     =>  'required|max:6',
        ]);
        $produto = Produto::find($id);
        $produto->nome              = $request['nome'];
        $produto->descricao         = $request['descricao'];
        $produto->tamanhoProduto_id = $request['tamanho'];
        $produto->custo             = $request['valor'];
        $produto->save();

        return Redirect::to('produto');
    }

    public function delete($id)
    {
        $produto = Produto::find($id);
         //se tiver algum pedido pendente para esse produto, ele n pode ser desativado
        if($produto->pedidoProduto()->get()){ 
        
           // foreach ($produto->pedidoProduto()->pedido()->get() as $pedido) {
             //   die($produto->pedidoProduto()->pedido()->get());
              //  if($pedido->ativo == '1' && $pedido->status_id == 1){
               //     $var[] = $pedido->id;
              //  }
           // }           
        }
        if(isset($var)){
            return Redirect::to('produto')
                        ->with('erro' , 'O produto '.$produto->nome.' não pode der deletada, pois existem pedido(s) pendente(s) vinculados a ele');
        } 
        $produto->ativo      = 0;
        $produto->save();
        return Redirect::to('produto')
                            ->with('success' , 'Produto deletado com sucesso');
    }
}
