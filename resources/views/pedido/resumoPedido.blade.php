@extends('layouts.app')

@section('content')
<div class="container">
<h2>Pedido</h2>
<br><br>
   
    <input type="hidden" name="pedido" value="{{$pedido->id}}">
        <div class="form-group">
            <label  class="col-md-4 control-label">Cliente</label>
      </br> <label class="col-md-4 form">{{$pedido->cliente->nome}}</label>
        </div> 
<br><br>
        <div class="form-group">
            <label for="entregador" class="col-md-4 control-label">Entregador</label>
      </br>  <label>{{$pedido->entregador->nome}}</label>
        </div> 
<br><br> 
      <div class="form-group">
        <table class="table">
            <header>
                <th>Item</th>
                <th>Nome</th>
                <th>Tamanho</th>
                <th>Valor Unit</th>
                <th>Qtd</th>
                <th>Valor total</th>
            </header>
            <tbody>   
                @foreach($pedido->pedidoProduto as $pedidoProduto)
                <tr>
                
                    <td><input type="hidden" name="item" value="{{$pedidoProduto->id}}"></td>
                    <td>{{$pedidoProduto->produto->nome}}</td>
                    <td>{{$pedidoProduto->produto->tamanhoProduto->nome}}</td>
                    <td>{{$pedidoProduto->produto->custo}}</td>
                    <form method = "POST"  action="/pedido/altualizado"  style="display:inline">
                        {{ csrf_field() }}
                        <input type="hidden" name="item" value="{{$pedidoProduto->id}}">
                        <td><input type="number" name="quantidade" value="{{$pedidoProduto->qtd}}" onclick="clicked(event)"> </td>
                    </form>                     
                    <td>{{$pedidoProduto->valorItem}}</td>
                   
                </tr>
                @endforeach
                </tbody>
                </table>
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
                   <form method = "POST"  action="/pedido/altualizado">
                        {{ csrf_field() }}
                        <input type="hidden" name="pedido" value="{{$pedido->id}}">
                        <label>Valor a receber:</label>
                        R$  <input id="valor" type="text" class="valor" name="valor" value="{{$pedido->valorEntregue}}" size="8" required>
                    </form>  
                </div>
                <div class="form-group">
                    <label>Troco:</label>
                    <label>R$ {{$pedido->troco}}</label>
                </div>

<br><br>
                <!--Botoes-->
                <form method = "POST"  action="/pedido/finalizado"  style="display:inline">
                    {{ csrf_field() }}
                    <input type="hidden" name="pedido" value="{{$pedido->id}}">
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <input class="btn btn-primary" type="submit" value="Finalizar">
                        </div>
                    </div>      
                </form>
</div>
@endsection
<script>
    function clicked(e) {
        e.preventDefault();
    }
</script>