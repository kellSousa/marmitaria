@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-danger">
        <div class="panel-heading">PEDIDO</div> <!--Um novo painel-->
         <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{url('produto')}}" style="display:inline"> 
              {{ csrf_field() }}
         <div class="form-group">
                  <div class="col-md-6">
                        <div class="col-lg-10">
                        <div class="input-group">
                        <input class="form-control" placeholder="Buscar Pedido..." name="pesq" type="text" >
                      <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit">Buscar</button>
                          </span>
                </div>
                </div>  
               </div>
           </div>
           <h4>Para realizar um novo Pedido</h4>
           <a class="btn btn-primary" href="{{url('/pedido_selCliente')}}"title="Adicionar Pedido" ><i class="glyphicon glyphicon-plus" aria-hidden="true"></i><i class="glyphicon glyphicon-cutlery" aria-hidden="true"></i></a>
        </form>

        <br>



            @if ($message = Session::get('erro'))
                <div class="alert alert-danger">
                    <p>{{ $message }}</p>
                </div>
            @endif
             @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

        <!-- Inicio da Tabela que mostra os resultados de Busca -->
                    <div class="table-responsive">
                      <table border = "1" class="table table-condensed">   
                        <thead>
                        <th class="danger">Cliente</th>
                        <th class="danger">Telefone</th>
                        <th class="danger">Data</th>
                        <th class="danger">Status</th>
                        <th class="danger">Entregador</th>
                        <th class="danger">Ações</th>
                    </thead>
                    <tbody>
                    @foreach($pedidos as $pedido)
                        <tr>
                            <td>{{$pedido->cliente->nome}} </td>
                            <td>{{$pedido->cliente->telefone}} </td>
                            <td>{{$pedido->created_at->format('d-m-Y')}} </td>
                            <td>{{$pedido->status->nome}}</td>
                            <td>{{$pedido->entregador->nome}}</td>
                            <td>            
                            <div>
                            <!--Botoes-->
                            <form method = "POST"  action="{{url('/pedido_show')}}"  style="display:inline">
                                {{ csrf_field() }}
                                <input type="hidden" name="pedido" value="{{$pedido->id}}">
                                <button class="btn btn-mini" class="confirm" type="submit" title="Detalhes"><i class="glyphicon glyphicon-th-list" aria-hidden="true"></i></button>
                            </form>  
                            <!--fim dos botoes-->                
                            </div> 
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
                </div>
                @endsection

</div>
</div>
</div>
</div>        