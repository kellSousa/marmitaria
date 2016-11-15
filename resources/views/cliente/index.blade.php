@extends('layouts.app')

@section('content')
<div class="container">
<h2>Cliente</h2>
<br><br>
     <form method="POST" action="{{url('cliente')}}" style="display:inline"> 
      {{ csrf_field() }}        
        <div class="form-group" >
                <strong>Buscar cliente:</strong>
                <input class="form-control" placeholder="Cliente" name="pesq" type="text" >
        </div>
        <div class="form-group" >
                <button type="submit" class="btn" >Buscar</button>
        </div>  
     </form>

<br>
@if(isset($pedido))
<a class="btn" href="{{url('/pedido/addCliente')}}"> Add Cliente </a>
@else
<a class="btn" href="{{url('/cliente/create')}}"> Add Cliente </a>
@endif

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
        <th>Nome</th>
        <th>Celular</th>
        <th>Endereço</th>
        <th>Ações</th>

    </thead>
    <tbody>
    @foreach($clientes as $cliente)
        <tr>
            <td>{{$cliente->nome}} </td>
            <td>{{$cliente->telefone}} </td>
            <td>{{$cliente->endereco}} </td>
            <td>            
            <div>
            <!--Botoes-->             
            <form method = "POST"  action="{{url('/cliente/delete' , $cliente->id )}}"  style="display:inline">
                {{ csrf_field() }}
                <a class="btn" href="{{url('/cliente/show' , $cliente->id  )}}"> Detalhes </a>
                <a class="btn" href="{{url('/cliente/edit' , $cliente->id  )}}"> Alterar </a>
                <input class="confirm" type="submit" onclick="clicked(event)" value="Deletar" />
                <a class="btn" href="{{url('/pedido/create' , $cliente->id )}}"> Add pedido </a>
            </form>                
            </div> 
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
<script>
    function clicked(e) {
        if(!confirm('Deseja deletar este cliente?'))e.preventDefault();
    }
</script>