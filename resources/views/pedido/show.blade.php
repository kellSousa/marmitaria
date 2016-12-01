@extends('layouts.app')

@section('content')
<div class="container">
<h2>Detalhes do Pedido</h2>
<br><br>
        <div class="form-group">
            <label  class="col-md-4 control-label">Cliente</label>
            <label>{{$pedido->cliente->nome}}</label>
        </div>

        <div class="form-group">
            <label  class="col-md-4 control-label">Entregador</label>
            <label>{{$pedido->entregador->nome}}</label>
        </div>

        <div class="form-group">
            <label  class="col-md-4 control-label">Status</label>
            <label>{{$pedido->status->nome}}</label>
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
                    <td>{{$pedidoProduto->qtd}}         </td>
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
                    <label>Valor a receber:</label>
                    <label>R$  {{$pedido->valorEntregue}}</label>
                </div>
                <div class="form-group">
                    <label>Troco:</label>
                    <label>R$ {{$pedido->troco}}</label>
                </div>         
        </div>
        <br><br>
        @if(isset($status))
        <div class="form-group">
            <form  method = "POST"  action="{{url('/pedido/editado')}}"  style="display:inline">
                {{ csrf_field() }}
                <input type="hidden" name="pedido" value="{{$pedido->id}}">
                <select name="statusPedido" type="submit">
                    <option value="0">Novo Status</option>
                @foreach($status as $statu)
                    <option value="{{$statu->id}}">{{$statu->nome}}</option>
                @endforeach
                </select>

                <input class="confirm" type="submit" value="Alterar" "/>
            </form>  
        </div>


        @endif

		<!--Botoes-->
        <div class="form-group">           
               <a class="btn" href="{{url('/pedido')}}"> Voltar </a> 
        </div>

       
</div>
@endsection
