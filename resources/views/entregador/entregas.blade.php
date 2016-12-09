@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-danger">
        <div class="panel-heading">DETALHES DE ENTREGAS</div>
        <!--Um novo painel-->
          <div class="panel-body">

             <form class="form-inline" method="POST" action="" style="display:inline"> 
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
                <br>
                <br>
                <div class="form-group">
                    <label class="col-md-0 control-label">Data Inicial</label>
                    <input id="dataI" type="date" class="form-control" name="dataI"  size="30" required>
                </div>

                <div class="form-group">
                    <label class="col-md-0 control-label">Data Final</label>
                    <input id="dataF" type="date" class="form-control" name="dataF"  size="30" required>
                </div>
                <br><br><br>
                <div class="form-group" >
                        <button type="submit" class="btn btn-danger" >Buscar</button>
                </div>  
             </form>

        <br><br><br>
            @if(isset($pedidos))
    <!-- Inicio da Tabela que mostra os resultados de Busca -->
            <div class="table-responsive">
              <table border = "1" class="table table-condensed">   
                <thead>
                    <th class="danger">Entregador</th>
                    <th class="danger">Cliente</th>
                    <th class="danger">Data</th>

                </thead>
                <tbody>
                @foreach($pedidos as $pedido)
                    <tr>
                        <td>{{$pedido->entregador->nome}} </td>
                        <td>{{$pedido->cliente->nome}} </td>
                        <td>{{$pedido->created_at->format('d-m-Y')}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        </div>
    </div>
        @endsection
        <script>
            function clicked(e) {
                if(!confirm('Deseja deletar este entregador ?'))e.preventDefault();
            }
        </script>
</div>
</div>
</div>
</div>
