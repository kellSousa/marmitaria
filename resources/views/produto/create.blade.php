@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-danger">
        <div class="panel-heading">CADASTRAR PRODUTO</div>
        <!--Um novo painel-->
          <div class="panel-body">
          <form class="form-inline" role="form" method="post" id="auto" action="" >
            {{ csrf_field() }}
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

                <div class="form-group{{ $errors->has('descricao') ? ' has-error' : '' }}">
                    <label for="descricao" class="col-md-4 control-label">Descrição</label>
                    <input id="descricao" type="text" class="form-control" name="descricao" value="{{ old('descricao') }}" size="30" required >
                        @if ($errors->has('descricao'))
                            <span class="help-block">
                                <strong>{{ $errors->first('descricao') }}</strong>
                            </span>
                        @endif
                </div>
                <br><br>
                <div class="form-group{{ $errors->has('tamanho') ? ' has-error' : '' }}">
                   <label for="Tamanho" class="col-md-4 control-label">Tamanho</label>
                   <select class="form-control" name="tamanho" value="{{ old('tamanho') }}" id="tamanho" required autofocus>
                        <option value ='0'>Selecione o tamanho ...</option>
                    @foreach($tamanhos as $tamanho)
                        <option value="{{$tamanho->id}}">{{$tamanho->nome}}</option>
                    @endforeach
                    </select>
                    @if ($errors->has('tamanho'))
                        <span class="help-block">
                            <strong>{{ $errors->first('tamanho') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('valor') ? ' has-error' : '' }}">
                    <label for="Valor" class="col-md-4 control-label">Valor R$</label>
                    <input id="valor" type="text" class="form-control valor" name="valor" value="{{ old('valor') }}" size="30" required>
                        @if ($errors->has('valor'))
                            <span class="help-block">
                                <strong>{{ $errors->first('valor') }}</strong>
                            </span>
                        @endif
                </div>        
                <br><br>
                <!--Botoes-->
                <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="Cadastrar">
                    </div>
                </div>
            </form>
        </div>
        @endsection
</div>
</div>
</div>
</div>