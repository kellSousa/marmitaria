@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-danger">
        <div class="panel-heading">ALTERAR CLIENTE</div>
        <!--Um novo painel-->
         <div class="panel-body">
            <form class="form-inline" role="form" method="post" id="auto" action="/cliente_editado" >
            {{ csrf_field() }}
             <input type="hidden" name="cliente" value="{{$cliente->id}}">
                <!--Dados a serem inseridos-->
                <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                    <label for="nome" class="col-md-0 control-label">Nome</label>
                    <input id="nome" type="text" class="form-control" name="nome" value="{{ $cliente->nome}}" size="30" required >
                        @if ($errors->has('nome'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nome') }}</strong>
                            </span>
                        @endif
                </div>
                <div class="form-group{{ $errors->has('dtNasc') ? ' has-error' : '' }}">
                    <label for="dtNasc" class="col-md-0 control-label">Data de Nasc</label>
                    <input id="dtNasc" type="date" class="form-control" name="dtNasc" value="{{$cliente->dtNasc}}" size="30" required>
                        @if ($errors->has('dtNasc'))
                            <span class="help-block">
                                <strong>{{ $errors->first('dtNasc') }}</strong>
                            </span>
                        @endif
                </div>
                <div class="form-group{{ $errors->has('telefone') ? ' has-error' : '' }}">
                    <label for="telefone" class="col-md-4 control-label">Telefone</label>
                    <input class="form-control celular" type="text" id="telefone" name="telefone" value="{{$cliente->telefone }}" size="15" required>
                        @if ($errors->has('telefone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('telefone') }}</strong>
                            </span>
                        @endif
                </div>
                <br><br>
                <div class="form-group{{ $errors->has('endereco') ? ' has-error' : '' }}">
                    <label for="endereco" class="col-md-0 control-label">Endereço</label>
                    <input id="endereco" type="text" class="form-control" name="endereco" value="{{$cliente->endereco}}" size="30" required>
                        @if ($errors->has('endereco'))
                            <span class="help-block">
                                <strong>{{ $errors->first('endereco') }}</strong>
                            </span>
                        @endif
                </div>

                <div class="form-group{{ $errors->has('pontoReferencia') ? ' has-error' : '' }}">
                    <label for="Ponto de referência" class="col-md-0 control-label">Ponto de referência</label>
                    <input id="pontoReferencia" type="text" class="form-control" name="pontoReferencia" value="{{$cliente->pontoReferencia}}" size="30" required>
                        @if ($errors->has('pontoReferencia'))
                            <span class="help-block">
                                <strong>{{ $errors->first('pontoReferencia') }}</strong>
                            </span>
                        @endif
                </div>
                <br><br>
                <!--Botoes-->
                <div class="form-group">
                        <button class="btn btn-primary" type="submit">Alterar</button>
                </div>
            </form>
        </div>
        @endsection
