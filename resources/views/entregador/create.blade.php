@extends('layouts.app')

@section('content')
<div class="container">
<h2>Entregador</h2>
<br><br>
    <form class="form-inline" role="form" method="post" id="auto" action="" >
    {{ csrf_field() }}
        <!--Dados a serem inseridos-->
        <div class="form-group{{ $errors->has('empresa') ? ' has-error' : '' }}">
           <label for="empresa" class="col-md-4 control-label">Empresa</label>
           <select class="form-control" name="empresa" value="{{ old('empresa') }}" id="empresa" required autofocus>
                <option value ='0'>Selecione uma empresa ...</option>
            @foreach($empresas as $empresa)
                <option value="{{$empresa->id}}">{{$empresa->nome}}</option>
            @endforeach
            </select>
            @if ($errors->has('empresa'))
                <span class="help-block">
                    <strong>{{ $errors->first('empresa') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
            <label for="nome" class="col-md-4 control-label">Nome</label>
            <input id="nome" type="text" class="form-control" name="nome" value="{{ old('nome') }}" size="30" required >
                @if ($errors->has('nome'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nome') }}</strong>
                    </span>
                @endif
        </div>

        <div class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }}">
            <label for="cpf" class="col-md-4 control-label">CPF</label>
            <input class="form-control cpf" type="text" id="cpf" name="cpf" value="{{ old('cpf') }}" size="30" required>
                @if ($errors->has('cpf'))
                    <span class="help-block">
                        <strong>{{ $errors->first('cpf') }}</strong>
                    </span>
                @endif
        </div>

        <div class="form-group{{ $errors->has('rg') ? ' has-error' : '' }}">
            <label for="rg" class="col-md-4 control-label">RG</label>
            <input id="rg" type="text" class="form-control numero" name="rg" value="{{ old('rg') }}" size="30" required>
                @if ($errors->has('rg'))
                    <span class="help-block">
                        <strong>{{ $errors->first('rg') }}</strong>
                    </span>
                @endif
        </div>

        <div class="form-group{{ $errors->has('celular') ? ' has-error' : '' }}">
            <label for="celular" class="col-md-4 control-label">Celular</label>
            <input id="celular" type="text" class="form-control celular" name="celular" value="{{ old('celular') }}" size="30" required>
                @if ($errors->has('celular'))
                    <span class="help-block">
                        <strong>{{ $errors->first('celular') }}</strong>
                    </span>
                @endif
        </div>

        <!--Botoes-->
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <input class="btn btn-primary" type="submit" value="Registrar">
            </div>
        </div>
    </form>
</div>
@endsection
