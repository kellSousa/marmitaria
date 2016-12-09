@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-danger">
        <div class="panel-heading">DETALHES DO CLIENTE</div>
        <!--Um novo painel-->
         <div class="panel-body">

        <!--Dados selecionados-->
        <div class="form-group">
            <label for="nome" class="col-md-4 control-label">Nome</label>
            <label>{{$cliente->nome}}</label>
        </div>

        <div class="form-group">
            <label for="dtNasc" class="col-md-4 control-label">Data de Nasc</label>
            <label>{{ date("d-m-Y", strtotime($cliente->dtNasc))}}</label>
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
            <label for="pontoReferencia" class="col-md-4 control-label">Ponto de referência</label>
            <label>{{$cliente->pontoReferencia}}</label>
        </div>

        <div class="form-group">
            <label for="created_at" class="col-md-4 control-label">Data de Registro</label>
            <label>{{$cliente->created_at->format('d-m-Y')}}</label>
        </div>

        <div class="form-group">
            <label for="updated_at" class="col-md-4 control-label">Data de Última Alteração</label>
            <label>{{$cliente->updated_at->format('d-m-Y')}}</label>
        </div>

        <!--Botoes-->
        <br><br>
        <div class="form-group">           
            <a class="btn btn-primary" href="{{url('/cliente')}}"><i class="glyphicon glyphicon-arrow-left" aria-hidden="true"></i></a>
            <form method = "POST"  action="{{url('/cliente_edit')}}"  style="display:inline">
                {{ csrf_field() }}
                <input type="hidden" name="cliente" value="{{$cliente->id}}">
               <button class="btn btn-primary" class="confirm" type="submit" value="Alterar"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></button>
            </form>  
        </div>
</div>
@endsection
</div>
</div>
</div>
</div>