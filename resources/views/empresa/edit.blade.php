@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-danger">
        <div class="panel-heading">ALTERAR EMPRESA</div>
        <!--Um novo painel-->
          <div class="panel-body">
            <form class="form-inline" role="form" method="post" id="auto" action="/empresa_editado" >
            {{ csrf_field() }}
            <input type="hidden" name="empresa" value="{{$empresa->id}}">
                <!--Dados a serem inseridos-->
                <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                    <label for="nome" class="col-md-4 control-label">Nome</label>
                    <input id="nome" type="text" class="form-control" name="nome" value="{{$empresa->nome}}" size="30" required >
                        @if ($errors->has('nome'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nome') }}</strong>
                            </span>
                        @endif
                </div>

                <div class="form-group{{ $errors->has('cnpj') ? ' has-error' : '' }}">
                    <label for="cnpj" class="col-md-4 control-label">CNPJ</label>
                    <input class="form-control cnpj" type="text" id="cnpj" name="cnpj" value="{{$empresa->cnpj}}" size="20" required>
                        @if ($errors->has('cnpj'))
                            <span class="help-block">
                                <strong>{{ $errors->first('cnpj') }}</strong>
                            </span>
                        @endif
                </div>
                <div class="form-group{{ $errors->has('telefone') ? ' has-error' : '' }}">
                    <label for="telefone" class="col-md-4 control-label">Telefone</label>
                    <input id="telefone" type="text" class="form-control telefoneFixo" name="telefone" value="{{ $empresa->telefone}}" size="14" required>
                        @if ($errors->has('telefone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('telefone') }}</strong>
                            </span>
                        @endif
                </div>
                <br><br>
                <div class="form-group{{ $errors->has('endereco') ? ' has-error' : '' }}">
                    <label for="endereco" class="col-md-4 control-label">Endereço</label>
                    <input id="endereco" type="text" class="form-control" name="endereco" value="{{$empresa->endereco}}" size="30" required>
                        @if ($errors->has('endereco'))
                            <span class="help-block">
                                <strong>{{ $errors->first('endereco') }}</strong>
                            </span>
                        @endif
                </div>

                

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">Email</label>
                    <input id="email" type="text" class="form-control" name="email" value="{{$empresa->email}}" size="30" required>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                </div>
                <br><br>
                <!--Botoes-->
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Alterar">
                    
                </div>
            </form>
        </div>
        @endsection
</div>
</div>
</div>
</div>
</div>