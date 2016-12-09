@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-danger">
        <div class="panel-heading">CADASTRAR PEDIDO</div>
        <!--Um novo painel-->
         <div class="panel-body">
    <form class="form-inline" role="form" method="post" id="auto" action="/pedido_criado" >
    {{ csrf_field() }}
        <!--Dados a serem inseridos-->
        @if(isset($cliente->id))
        <div class="form-group{{ $errors->has('cliente') ? ' has-error' : '' }}">
            <label for="cliente" class="col-md-4 control-label">Cliente</label>
            <input id="cliente" type="text" class="form-control" name="cliente" value="{{$cliente->nome}}" size="30" required readonly="readonly">
            <input type="hidden" name="clienteid" value="{{$cliente->id}}">
                @if ($errors->has('cliente'))
                    <span class="help-block">
                        <strong>{{ $errors->first('cliente') }}</strong>
                    </span>
                @endif
        </div> 
        @endif
<br><br>      
        <div class="form-group{{ $errors->has('entregador') ? ' has-error' : '' }}">
           <label for="entregador" class="col-md-4 control-label">Entregador</label>
           <select class="form-control" name="entregador" value="{{ old('entregador') }}" id="entregador" required autofocus>
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
<br><br><br>
        <h4>Lista de Produtos Disponíveis</h4>
        <div class="form-group">
        <table class="table">
            <header>
                <th class="danger">Selecione</th>
                <th class="danger">Nome</th>
                <th class="danger">Tamanho</th>
                <th class="danger">Valor</th>
                <th class="danger">Descrição</th>
            </header>
            <tbody>
            @foreach($produtos as $produto)
            <tr>
                <td><input type="checkbox" name="produtos[]" value ="{{$produto->id}}"></td>
                <td>{{$produto->nome}}</td>
                <td>{{$produto->tamanhoProduto->nome}}</td>
                <td>R$ {{$produto->custo}}</td>
                <td>{{$produto->descricao}}</td>
            </tr>
            @endforeach
                
            </tbody>
        </table>
           
        </div> 
<br>
        <!--Botoes-->
        <div class="form-group">
                <button class="btn btn-primary" type="submit" value="">Fazer Pedido</button>
            
        </div>        
    </form>

    
</div>
@endsection
</div>
</div>
</div>
</div>