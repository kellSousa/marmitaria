@extends('layouts.app')

@section('content')
<div class="container">
<h2>Entregador</h2>
<br><br>
     <form method="POST" action="{{url('entregador')}}" style="display:inline"> 
      {{ csrf_field() }}        
        <div class="form-group" >
                <strong>Buscar entregador:</strong>
                <input class="form-control" placeholder="Entregador" name="pesq" type="text" >
        </div>
        <div class="form-group" >
                <button type="submit" class="btn" >Buscar</button>
        </div>  
     </form>

<br>

<a class="btn" href="{{url('/entregador/create/0')}}"> Add Entregador </a>

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
        <th>Ações</th>

    </thead>
    <tbody>
    @foreach($entregadores as $entregador)
        <tr>
            <td>{{$entregador->nome}} </td>
            <td>{{$entregador->celular}} </td>
            <td>            
            <div>
            <!--Botoes-->             
            <form method = "POST"  action="{{url('/entregador/delete' , $entregador->id )}}"  style="display:inline">
                {{ csrf_field() }}
                <a class="btn" href="{{url('/entregador/show' , $entregador->id  )}}"> Detalhes </a>
                <a class="btn" href="{{url('/entregador/edit' , $entregador->id  )}}"> Alterar </a>
                <input class="confirm" type="submit" onclick="clicked(event)" value="Deletar" />
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
        if(!confirm('Deseja deletar este entregador'))e.preventDefault();
    }
</script>