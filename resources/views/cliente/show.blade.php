@extends('layouts.app')

@section('content')
<div class="container">
<h2>Cliente</h2>
<br><br>
		<!--Dados selecionados-->
        <div class="form-group">
            <label for="nome" class="col-md-4 control-label">Nome</label>
            <label>{{$cliente->nome}}</label>
        </div>

        <div class="form-group">
            <label for="telefone" class="col-md-4 control-label">Telefone</label>
            <label>{{$cliente->telefone}}</label>
        </div>

        <div class="form-group">
            <label for="endereco" class="col-md-4 control-label">Endereço</label>
            <label>{{$cliente->endereco}}</label>
        </div>

        <div class="form-group">
            <label for="pontoReferencia" class="col-md-4 control-label">Ponto de referêcia</label>
			<label>{{$cliente->pontoReferencia}}</label>
        </div>

        <div class="form-group">
            <label for="dtNasc" class="col-md-4 control-label">Data de Nasc</label>
			<label>{{ date("d-m-Y", strtotime($cliente->dtNasc))}}</label>
		</div>

		<div class="form-group">
            <label for="created_at" class="col-md-4 control-label">Data de Registro</label>
			<label>{{$cliente->created_at->format('d-m-Y')}}</label>
		</div>

		<div class="form-group">
            <label for="updated_at" class="col-md-4 control-label">Data de ultima alteração</label>
			<label>{{$cliente->updated_at->format('d-m-Y')}}</label>
		</div>

		<!--Botoes-->
        <div class="form-group">           
               <a class="btn" href="{{url('/cliente')}}"> Voltar </a> 
        </div>

        <div class="form-group">           
               <a class="btn" href="{{url('/cliente/edit' , $cliente->id  )}}"> Alterar </a> 
        </div>
</div>
@endsection
