@extends('layouts.app')

@section('content')
<div class="container">
<h2>Empresa</h2>
<br><br>
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
            <label for="endereco" class="col-md-4 control-label">Endereço</label>
            <label>{{$empresa->endereco}}</label>
        </div>

        <div class="form-group">
            <label for="telefone" class="col-md-4 control-label">Telefone</label>
			<label>{{$empresa->telefone}}</label>
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
            <label for="updated_at" class="col-md-4 control-label">Data de ultima alteração</label>
			<label>{{$empresa->updated_at->format('d-m-Y')}}</label>
		</div>

		<!--Botoes-->
        <div class="form-group">           
               <a class="btn" href="{{url('/empresa')}}"> Voltar </a> 
        </div>

        <div class="form-group">           
               <a class="btn" href="{{url('/empresa/edit' , $empresa->id  )}}"> Alterar </a> 
        </div>

        <div class="form-group">
        <br>
        <h4>Entregadores que pertencem a esta empresa</h4>
        <br>
        <table class="table">
        <thead>
            <th>Nome</th>
            <th>Data de cadastro</th>
            <th>Ativo?</th>
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
