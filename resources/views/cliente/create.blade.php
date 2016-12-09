@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-danger">
        <div class="panel-heading">CADASTRAR CLIENTE</div>
        <!--Um novo painel-->
          <div class="panel-body">

            <form class="form-inline" role="form" method="post" id="auto" action="" >
            {{ csrf_field() }}
            @if(isset($pedido))
            <input type="hidden" name="pedido" value="1">
            @else
            <input type="hidden" name="pedido" value="0">
            @endif
                <!--Dados a serem inseridos-->
                <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                    <label for="nome" class="col-md-4 control-label">Nome</label>
                    <input id="nome" type="text" class="form-control" name="nome" value="{{ old('nome') }}" size="30" required >
                        @if ($errors->has('nome'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nome') }}</strong>
                            </span>
                        @endif
                </div>

                <div class="form-group{{ $errors->has('dtNasc') ? ' has-error' : '' }}">
                    <label for="dtNasc" class="col-md-0 control-label">Data de Nasc</label>
                    <input id="dtNasc" type="date" class="form-control" name="dtNasc" value="{{ old('dtNasc') }}" size="30" required>
                        @if ($errors->has('dtNasc'))
                            <span class="help-block">
                                <strong>{{ $errors->first('dtNasc') }}</strong>
                            </span>
                        @endif
                </div>

                <div class="form-group{{ $errors->has('telefone') ? ' has-error' : '' }}">
                    <label for="telefone" class="col-md-4 control-label">Telefone</label>
                    <input class="form-control celular" type="text" id="telefone" name="telefone" value="{{ old('telefone') }}" size="15" required>
                        @if ($errors->has('telefone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('telefone') }}</strong>
                            </span>
                        @endif
                </div>
                <br><br>
                <div class="form-group{{ $errors->has('endereco') ? ' has-error' : '' }}">
                    <label for="endereco" class="col-md-4 control-label">Endereço</label>
                    <input id="endereco" type="text" class="form-control" name="endereco" value="{{ old('endereco') }}" size="30" required>
                        @if ($errors->has('endereco'))
                            <span class="help-block">
                                <strong>{{ $errors->first('endereco') }}</strong>
                            </span>
                        @endif
                </div>

                <div class="form-group{{ $errors->has('pontoReferencia') ? ' has-error' : '' }}">
                    <label for="Ponto de referência" class="col-md-0 control-label">Ponto de referência</label>
                    <input id="pontoReferencia" type="text" class="form-control" name="pontoReferencia" value="{{ old('pontoReferencia') }}" size="30" required>
                        @if ($errors->has('pontoReferencia'))
                            <span class="help-block">
                                <strong>{{ $errors->first('pontoReferencia') }}</strong>
                            </span>
                        @endif
                </div>
                <br><br>
                <!--Botoes-->
                <div class="form-group">
                        <Button class="btn btn-primary" type="submit">Cadastrar</Button>
                
                </div>
            </form>
        </div>
        @endsection
</div>
</div>
</div>
</div>