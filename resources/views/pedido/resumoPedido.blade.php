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

                <label>Talor Total:</label>
                <label>{{$pedido->pedidoProduto->sum('valorItem')}}</label>

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