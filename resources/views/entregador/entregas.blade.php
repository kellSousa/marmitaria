@extends('layouts.app')

@section('content')
<div class="container">
<h2>Entregas</h2>
<br><br>
     <form method="POST" action="" style="display:inline"> 
      {{ csrf_field() }}        
        
        <div class="form-group">
           <label for="entregador" class="col-md-4 control-label">Entregador</label>
           <select class="form-control" name="entregador" value="{{ old('entregador') }}" id="entregador"  autofocus>
                <option value ='0'>Selecione um entregador ...</option>
            @foreach($entregadores as $entregador)
                <option value="{{$entregador->id}}">{{$entregador->nome}}</option>
            @endforeach
            </select>
            @if ($errors->has('entregador'))
                <span class="help-block">
                    <strong>{{ $errors->first('entregador') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <label>Data Inicial</label>
            <input id="dataI" type="date" class="form-control" name="dataI"  size="30" required>
        </div>

        <div class="form-group">
            <label>Data Final</label>
            <input id="dataF" type="date" class="form-control" name="dataF"  size="30" required>
        </div>

        <div class="form-group" >
                <button type="submit" class="btn" >Buscar</button>
        </div>  
     </form>

<br>
@if(isset($pedidos))
<table class="table">
    <thead>
        <th>Entregador</th>
        <th>Cliente</th>
        <th>Data</th>

    </thead>
    <tbody>
    @foreach($pedidos as $pedido)
        <tr>
            <td>{{$pedido->entregador->nome}} </td>
            <td>{{$pedido->cliente->nome}} </td>
            <td>{{$pedido->created_at->format('d-m-Y')}}           </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
</div>
@endsection
<script>
    function clicked(e) {
        if(!confirm('Deseja deletar este entregador'))e.preventDefault();
    }
</script>