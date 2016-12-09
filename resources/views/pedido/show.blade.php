@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-danger">
        <div class="panel-heading">DETALHES DO PEDIDO</div>
        <!--Um novo painel-->
         <div class="panel-body">

        <div class="form-group">
            <label  class="col-md-4 control-label">Cliente:</label>
            <label>{{$pedido->cliente->nome}}</label>
        </div>

        <div class="form-group">
            <label  class="col-md-4 control-label">Entregador:</label>
            <label>{{$pedido->entregador->nome}}</label>
        </div>

        <div class="form-group">
            <label  class="col-md-4 control-label">Status:</label>
            <label>{{$pedido->status->nome}}</label>
        </div>

        <br><br> 
<!-- Inicio da Tabela que mostra os resultados de Busca -->
            <div class="table-responsive">
              <table border = "1" class="table table-condensed">   
                <thead>
                <th class="danger">Item</th>
                <th class="danger">Nome</th>
                <th class="danger">Tamanho</th>
                <th class="danger">Valor Unit</th>
                <th class="danger">Qtd</th>
                <th class="danger">Valor Total</th>
            </thead>
            <tbody>   
                @foreach($pedido->pedidoProduto as $pedidoProduto)
                <tr>                
                    <td><input type="hidden" name="item" value="{{$pedidoProduto->id}}"></td>
                    <td>{{$pedidoProduto->produto->nome}}</td>
                    <td>{{$pedidoProduto->produto->tamanhoProduto->nome}}</td>
                    <td>{{$pedidoProduto->produto->custo}}</td>
                    <td>{{$pedidoProduto->qtd}}         </td>
                    <td>{{$pedidoProduto->valorItem}}</td>
                   
                </tr>
                @endforeach
                </tbody>
                </table>
                <br><br>
             
               <div class="form-group">
                    <label>Valor total de produtos:</label>
                    <label>R$ {{$pedido->pedidoProduto->sum('valorItem')}}</label>
                </div>
                <div class="form-group">
                    <label>Taxa de entrega:</label>
                    <label>R$ {{$pedido->taxaEntrega}}</label>
                </div>
                 <div class="form-group">
                    <label>Total a pagar:</label>
                    <label>R$ {{$pedido->valorTotal}}</label>
                </div>
                 <div class="form-group">
                    <label>Valor a receber:</label>
                    <label>R$  {{$pedido->valorEntregue}}</label>
                </div>
                <div class="form-group">
                    <label>Troco:</label>
                    <label>R$ {{$pedido->troco}}</label>
                </div>
                

        </div>
        
        @if(isset($status))
        
            <form class="form-inline" method = "POST"  action="{{url('/pedido_editado')}}"  style="display:inline">
                {{ csrf_field() }}
                <div class="form-group">
                <input type="hidden" name="pedido" value="{{$pedido->id}}">
                <select class="form-control" name="statusPedido" type="submit">
                    <option value="0">Novo Status</option>
                @foreach($status as $statu)
                    <option value="{{$statu->id}}">{{$statu->nome}}</option>
                @endforeach
                </select>
                <br><br>
                <button class="btn btn-primary" class="confirm" type="submit" title="Alterar">Alterar</button> 
                </div>
            </form>  
        


        @endif

        <!--Botoes-->
        <div class="form-group">   
                <a class="btn btn-primary" href="{{url('/pedido')}}"title="Voltar"><i class="glyphicon glyphicon-arrow-left" aria-hidden="true"></i></a>  
                       
        </div>

       
</div>
@endsection
</div>
</div>
</div>
</div>