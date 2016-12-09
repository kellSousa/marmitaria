@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-danger">
        <div class="panel-heading">RESUMO DO PEDIDO</div>
        <!--Um novo painel-->
         <div class="panel-body">
         <input type="hidden" name="pedido" value="{{$pedido->id}}">
                <div class="form-group">
                    <label class="col-md-4 control-label">Cliente: </label>
               <label>{{$pedido->cliente->nome}}</label>
                </div> 
        <br><br>
                <div class="form-group">
                    <label class="col-md-4 control-label">Entregador: </label>
                <label>{{$pedido->entregador->nome}}</label>
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
                            <form method = "POST"  action="/pedido_altualizado"  style="display:inline">
                                {{ csrf_field() }}
                                <input type="hidden" name="item" value="{{$pedidoProduto->id}}">
                                <td><input type="number"  min="1" name="quantidade" value="{{$pedidoProduto->qtd}}" onclick="clicked(event)"> </td>
                            </form>                     
                            <td>{{$pedidoProduto->valorItem}}</td>
                           
                        </tr>
                        @endforeach
                        </tbody>
                        </table>
                  </div>      
                        <br>
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
                           <form method = "POST"  action="/pedido_altualizado">
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
                        <form method = "POST"  action="/pedido_finalizado"  style="display:inline">
                            {{ csrf_field() }}
                            <input type="hidden" name="pedido" value="{{$pedido->id}}">
                            <div class="form-group">
                                    <button class="btn btn-primary" type="submit" value="">Finalizar</button>
                                
                            </div>      
                        </form>
        </div>
    </div>
        @endsection
        <script>
            function clicked(e) {
                e.preventDefault();
            }
        </script>

</div>
</div>
</div>
</div>