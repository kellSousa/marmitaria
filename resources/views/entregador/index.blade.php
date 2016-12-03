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

<a class="btn" href="{{url('/entregador/create')}}"> Add Entregador </a>
<a class="btn" href="{{url('/entregador/entregas')}}"> Entregas Realizadas </a>

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
            <form method = "POST"  action="{{url('/entregador/show')}}"  style="display:inline">
                {{ csrf_field() }}
                <input type="hidden" name="entregador" value="{{$entregador->id}}">
                <input class="confirm" type="submit" value="Detalhes" />
            </form>  
            <form method = "POST"  action="{{url('/entregador/edit')}}"  style="display:inline">
                {{ csrf_field() }}
                <input type="hidden" name="entregador" value="{{$entregador->id}}">
                <input class="confirm" type="submit" value="Alterar" />
            </form>  
            <form method = "POST"  action="{{url('/entregador/delete')}}"  style="display:inline">
                {{ csrf_field() }}
                <input type="hidden" name="entregador" value="{{$entregador->id}}">
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
        if(!confirm('Deseja deletar este entregador'))e.preventDefault();
    }
</script>