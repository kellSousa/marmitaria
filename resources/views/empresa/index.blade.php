@extends('layouts.app')

@section('content')
<div class="container">
<h2>Empresa</h2>
<br><br>
     <form method="POST" action="{{url('empresa')}}" style="display:inline"> 
      {{ csrf_field() }}        
        <div class="form-group" >
                <strong>Buscar empresa:</strong>
                <input class="form-control" placeholder="Empresa" name="pesq" type="text" >
        </div>
        <div class="form-group" >
                <button type="submit" class="btn" >Buscar</button>
        </div>  
     </form>

<br>
<a class="btn" href="{{url('/empresa/create')}}"> Add Empresa </a>

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
        <th>Telefone</th>
        <th>Ações</th>

    </thead>
    <tbody>
    @foreach($empresas as $empresa)
        <tr>
            <td>{{$empresa->nome}} </td>
            <td>{{$empresa->telefone}} </td>
            <td>            
            <div>
            <!--Botoes-->     
            <form method = "POST"  action="{{url('/empresa/show')}}"  style="display:inline">
                {{ csrf_field() }}
                <input type="hidden" name="empresa" value="{{$empresa->id}}">
                <input class="confirm" type="submit" value="Detalhes" />
            </form>  
            <form method = "POST"  action="{{url('/empresa/edit')}}"  style="display:inline">
                {{ csrf_field() }}
                <input type="hidden" name="empresa" value="{{$empresa->id}}">
                <input class="confirm" type="submit" value="Alterar" />
            </form>  
            <form method = "POST"  action="{{url('/empresa/addEntregador')}}"  style="display:inline">
                {{ csrf_field() }}
                <input type="hidden" name="empresa" value="{{$empresa->id}}">
                <input class="confirm" type="submit" value="Add Entregador" />
            </form>  
            <form method = "POST"  action="{{url('/empresa/delete')}}"  style="display:inline">
                {{ csrf_field() }}
                <input type="hidden" name="empresa" value="{{$empresa->id}}">
                <input class="confirm" type="submit" value="Deletar" onclick="clicked(event)"/>
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
        if(!confirm('Deseja deletar está empresa?'))e.preventDefault();
    }
</script>