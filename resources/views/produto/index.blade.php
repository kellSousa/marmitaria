@extends('layouts.app')

@section('content')
<div class="container">
<h2>Produto</h2>
<br><br>
     <form method="POST" action="{{url('produto')}}" style="display:inline"> 
      {{ csrf_field() }}        
        <div class="form-group" >
                <strong>Buscar produto:</strong>
                <input class="form-control" placeholder="Produto" name="pesq" type="text" >
        </div>
        <div class="form-group" >
                <button type="submit" class="btn" >Buscar</button>
        </div>  
     </form>

<br>

<a class="btn" href="{{url('/produto/create')}}"> Add Produto </a>

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
        <th>Descrição</th>
        <th>Valor</th>
        <th>Ações</th>

    </thead>
    <tbody>
    @foreach($produtos as $produto)
        <tr>
            <td>{{$produto->nome}} </td>
            <td>{{$produto->descricao}} </td>
            <td>{{$produto->custo}} </td>
            <td>            
            <div>
            <!--Botoes-->             
            <form method = "POST"  action="{{url('/produto/delete' , $produto->id )}}"  style="display:inline">
                {{ csrf_field() }}
                <a class="btn" href="{{url('/produto/show' , $produto->id  )}}"> Detalhes </a>
                <a class="btn" href="{{url('/produto/edit' , $produto->id  )}}"> Alterar </a>
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
        if(!confirm('Deseja deletar este produto?'))e.preventDefault();
    }
</script>