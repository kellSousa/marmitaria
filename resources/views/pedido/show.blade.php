@extends('layouts.app')

@section('content')
<div class="container">
<h2>Produto</h2>
<br><br>
		<!--Dados selecionados-->
        <div class="form-group">
            <label for="nome" class="col-md-4 control-label">Nome</label>
            <label>{{$produto->nome}}</label>
        </div>

        <div class="form-group">
            <label for="telefone" class="col-md-4 control-label">Descrição</label>
            <label>{{$produto->descricao}}</label>
        </div>

        <div class="form-group">
            <label for="endereco" class="col-md-4 control-label">Tamanho</label>
            <label>{{$produto->tamanhoProduto->nome}}</label>
        </div>

        <div class="form-group">
            <label for="pontoReferencia" class="col-md-4 control-label">Valor</label>
			<label> R$ {{$produto->custo}}</label>
        </div>

		<div class="form-group">
            <label for="created_at" class="col-md-4 control-label">Data de Registro</label>
			<label>{{$produto->created_at->format('d-m-Y')}}</label>
		</div>

		<div class="form-group">
            <label for="updated_at" class="col-md-4 control-label">Data de ultima alteração</label>
			<label>{{$produto->updated_at->format('d-m-Y')}}</label>
		</div>

		<!--Botoes-->
        <div class="form-group">           
               <a class="btn" href="{{url('/produto')}}"> Voltar </a> 
        </div>

        <div class="form-group">           
               <a class="btn" href="{{url('/produto/edit' , $produto->id  )}}"> Alterar </a> 
        </div>
</div>
@endsection
