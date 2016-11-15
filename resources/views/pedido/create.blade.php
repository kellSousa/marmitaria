@extends('layouts.app')

@section('content')
<div class="container">
<h2>Pedido</h2>
<br><br>
    <form class="form-inline" role="form" method="post" id="auto" action="" >
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
<br><br>              
        @endif
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
<br><br><br><br>
        <div class="form-group">
        <table class="table">
            <header>
                <th>Selecione</th>
                <th>Nome</th>
                <th>Tamanho</th>
                <th>Valor</th>
                <th>Descrição</th>
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
<br><br>
        <!--Botoes-->
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <input class="btn btn-primary" type="submit" value="Registrar">
            </div>
        </div>        
    </form>

    
</div>
@endsection
