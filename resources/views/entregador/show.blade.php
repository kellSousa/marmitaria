@extends('layouts.app')

@section('content')
<div class="container">
<h2>Entregador</h2>
<br><br>
		<!--Dados selecionados-->
        <div class="form-group">
            <label for="empresa" class="col-md-4 control-label">Empresa</label>
            <label>{{$empresa->nome}}</label>
        </div>

        <div class="form-group">
            <label for="cnpj" class="col-md-4 control-label">Nome</label>
            <label>{{$entregador->nome}}</label>
        </div>

        <div class="form-group">
            <label for="endereco" class="col-md-4 control-label">CPF</label>
            <label>{{$entregador->cpf}}</label>
        </div>

        <div class="form-group">
            <label for="telefone" class="col-md-4 control-label">RG</label>
			<label>{{$entregador->rg}}</label>
        </div>

        <div class="form-group">
            <label for="email" class="col-md-4 control-label">Telefone</label>
			<label>{{$entregador->celular}}</label>
		</div>

		<div class="form-group">
            <label for="created_at" class="col-md-4 control-label">Data de Registro</label>
			<label>{{$entregador->created_at->format('d-m-Y')}}</label>
		</div>

		<div class="form-group">
            <label for="updated_at" class="col-md-4 control-label">Data de ultima alteração</label>
			<label>{{$entregador->updated_at->format('d-m-Y')}}</label>
		</div>

		<!--Botoes-->
        <div class="form-group">           
               <a class="btn" href="{{url('/entregador')}}"> Voltar </a> 
        </div>

        <div class="form-group">           
               <a class="btn" href="{{url('/entregador/edit' , $entregador->id  )}}"> Alterar </a> 
        </div>
</div>
@endsection
