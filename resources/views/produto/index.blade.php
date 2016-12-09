@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-danger">
        <div class="panel-heading">PRODUTO</div>
        <!--Um novo painel-->
         <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{url('produto')}}" style="display:inline"> 
              {{ csrf_field() }}  
              <div class="form-group">
                  <div class="col-md-6">
                        <div class="col-lg-10">
                        <div class="input-group">
                        <input class="form-control" placeholder="Buscar Produto..." name="pesq" type="text" >
                      <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit">Buscar</button>
                          </span>
                </div>
                </div>  
               </div>
           </div>
           <h4>Adicione um Novo Produto</h4>
           <a class="btn btn-primary" href="{{url('/produto_create')}}" title="Adicionar Produto" ><i class="glyphicon glyphicon-plus" aria-hidden="true"></i></a>
             </form>
          

            @if ($message = Session::get('erro'))
                <div class="alert alert-danger">
                    <p>{{ $message }}</p>
                </div>
            @endif
             @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

        <!-- Inicio da Tabela que mostra os resultados de Busca -->
                    <div class="table-responsive">
                      <table border = "1" class="table table-condensed">   
                        <thead>
                            <th class="danger">Nome</th>
                            <th class="danger">Descrição</th>
                            <th class="danger">Valor R$</th>
                            <th class="danger">Ações</th>
                        </thead>
                    <tbody>
                    @foreach($produtos as $produto)
                        <tr>
                            <td>{{$produto->nome}} </td>
                            <td>{{$produto->descricao}} </td>
                            <td>R$ {{$produto->custo}} </td>
                            <td>            
                            
                            <!--Botoes-->  
                            <form method = "POST"  action="{{url('/produto_show')}}"  style="display:inline">
                                {{ csrf_field() }}
                                <input type="hidden" name="produto" value="{{$produto->id}}">
                                <button class="btn btn-mini" class="confirm" type="submit" title="Detalhes"><i class="glyphicon glyphicon-th-list" aria-hidden="true"></i></button>
                            </form>   
                            <form method = "POST"  action="{{url('/produto_edit')}}"  style="display:inline">
                                {{ csrf_field() }}
                                <input type="hidden" name="produto" value="{{$produto->id}}">
                                <button class="btn btn-mini" class="confirm" type="submit" title="Alterar"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></button>
                            </form>   
                            <form method = "POST"  action="{{url('/produto_delete')}}"  style="display:inline">
                                {{ csrf_field() }}
                                <input type="hidden" name="produto" value="{{$produto->id}}">
                                <button class="btn btn-mini" class="confirm" type="submit" title="Deletar" onclick="clicked(event)"><i class="glyphicon glyphicon-remove" aria-hidden="true"></i></button>
                            </form>                 
                            
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
               </div>
    
        </div>
        </div>
        </div>
        </div> 
 
        @endsection
        <script>
            function clicked(e) {
                if(!confirm('Deseja deletar este produto?'))e.preventDefault();
            }
        </script>

