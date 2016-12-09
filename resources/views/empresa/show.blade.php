@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-danger">
        <div class="panel-heading">DETALHES DA EMPRESA</div>
        <!--Um novo painel-->
          <div class="panel-body">
		<!--Dados da empresa selecionada-->
        <div class="form-group">
            <label for="name" class="col-md-4 control-label">Nome</label>
            <label>{{$empresa->nome}}</label>
        </div>

        <div class="form-group">
            <label for="cnpj" class="col-md-4 control-label">CNPJ</label>
            <label>{{$empresa->cnpj}}</label>
        </div>
        <div class="form-group">
            <label for="telefone" class="col-md-4 control-label">Telefone</label>
            <label>{{$empresa->telefone}}</label>
        </div>
        <div class="form-group">
            <label for="endereco" class="col-md-4 control-label">Endereço</label>
            <label>{{$empresa->endereco}}</label>
        </div>
        <div class="form-group">
            <label for="email" class="col-md-4 control-label">Email</label>
			<label>{{$empresa->email}}</label>
		</div>

		<div class="form-group">
            <label for="created_at" class="col-md-4 control-label">Data de Registro</label>
			<label>{{$empresa->created_at->format('d-m-Y')}}</label>
		</div>

		<div class="form-group">
            <label for="updated_at" class="col-md-4 control-label">Data da Última Alteração</label>
			<label>{{$empresa->updated_at->format('d-m-Y')}}</label>
		</div>

		<!--Botoes-->

        <div class="form-group">     
        <a class="btn btn-primary" href="{{url('/empresa')}}" title="Voltar"><i class="glyphicon glyphicon-arrow-left" aria-hidden="true"></i></a>      
            <form method = "POST"  action="{{url('/empresa_edit')}}"  style="display:inline">
                {{ csrf_field() }}
                <input type="hidden" name="empresa" value="{{$empresa->id}}">
                <button class="btn btn-primary"class="confirm" type="submit" title="Alterar" ><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></button>
            </form> 
        </div>

        <!--NOVA TABELA-->
        <br>
        <h4>Entregadores que pertencem a esta Empresa</h4>
        <div class="table-responsive">
        <table border = "1" class="table table-condensed">   
        
        <thead>
            <th class="danger">Nome</th>
            <th class="danger">Data de cadastro</th>
            <th class="danger">Ativo?</th>
        </thead>
        <tbody>
        @foreach($empresa->entregador as $entregador)
        <tr>
            <td>{{$entregador->nome}}</td>
            <td>{{$entregador->created_at->format('d-m-Y')}}</td>
            <td>
                @if($entregador->ativo == 1)
                    Sim
                @else
                    Não
                @endif
            </td>
        </tr>
        @endforeach
        </tbody>
        </table>  
        </div>
</div>
@endsection
</div>
</div>
</div>
</div>