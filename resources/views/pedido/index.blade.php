@extends('layouts.app')

@section('content')
<div class="container">
<h2>Pedido</h2>
<br><br>
     <form method="POST" action="{{url('pedido')}}" style="display:inline"> 
      {{ csrf_field() }}        
        <div class="form-group" >
                <strong>Buscar pedido:</strong>
                <input class="form-control" placeholder="Pedido" name="pesq" type="text" >
        </div>
        <div class="form-group" >
                <button type="submit" class="btn" >Buscar</button>
        </div>  
     </form>

<br>

<a class="btn" href="{{url('/pedido/selCliente')}}"> Add Pedido </a>

    @if ($message = Session::get('erro'))
        <div class="alertr">
            <p>{{ $message }}</p>
        </div>
    @endif
     @if ($message = Session::get('success'))
        <div class="alert">
            <p>{{ $message }}</p>
        </div>
    @endif

<table class="table">
    <thead>
        <th>Cliente</th>
        <th>Telefone</th>
        <th>Data</th>
        <th>Status</th>
        <th>Entregador</th>
        <th>Ações</th>
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
            <form method = "POST"  action="{{url('/pedido/show')}}"  style="display:inline">
                {{ csrf_field() }}
                <input type="hidden" name="pedido" value="{{$pedido->id}}">
                <input class="confirm" type="submit" value="Detalhes" "/>
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