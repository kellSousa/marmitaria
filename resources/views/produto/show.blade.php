@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-danger">
        <div class="panel-heading">DETALHES DO PRODUTO</div>
        <!--Um novo painel-->
          <div class="panel-body">
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
            <label for="updated_at" class="col-md-4 control-label">Data da Última Alteração</label>
			<label>{{$produto->updated_at->format('d-m-Y')}}</label>
		</div>
        <br>
		<!--Botoes-->   

        <div class="form-group"> 
                <a class="btn btn-primary" href="{{url('/produto')}}" title="Voltar"><i class="glyphicon glyphicon-arrow-left" aria-hidden="true"></i></a>          
               <form method = "POST"  action="{{url('/produto_edit')}}"  style="display:inline">
                {{ csrf_field() }}
                <input type="hidden" name="produto" value="{{$produto->id}}">
                <button class="btn btn-primary" class="confirm" type="submit" title="Alterar"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></button>
            </form>
        </div>
</div>
@endsection
</div>
</div>
</div>
</div>