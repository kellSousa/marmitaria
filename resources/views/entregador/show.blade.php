@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-danger">
        <div class="panel-heading">DETALHES DO ENTREGADOR</div>
        <!--Um novo painel-->
        <div class="panel-body">
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
            <label for="updated_at" class="col-md-4 control-label">Data da Última Alteração</label>
            <label>{{$entregador->updated_at->format('d-m-Y')}}</label>
        </div>

        <!--Botoes-->
        <br>

        <div class="form-group">  
                <a class="btn btn-primary" href="{{url('/entregador')}}" title="Voltar"><i class="glyphicon glyphicon-arrow-left" aria-hidden="true"></i></a>            
               <form method = "POST"  action="{{url('/entregador_edit')}}"  style="display:inline">
                {{ csrf_field() }}
                <input type="hidden" name="entregador" value="{{$entregador->id}}">
                <button class="btn btn-primary" class="confirm" type="submit" title="Alterar"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></button>
            </form> 
        </div>
</div>
@endsection
</div>
</div>
</div>
</div>