@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-success">
        <div class="panel-heading">Produto</div>
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

             </form>
    
        <br>

        <a class="btn btn-primary" href="{{url('/produto/create')}}" ><i class="glyphicon glyphicon-plus" aria-hidden="true"></i> Adicionar Produto </a>

            @if ($message = Session::get('erro'))
                <div class="alertr">
                    <p>{{ $message }}</p>
                </div>
            @endif
             @if ($message = Session::get('success'))
                <div class="alert">
                    <p>{{ $message }}</p>
                </div>
            @endif

        <!-- Inicio da Tabela que mostra os resultados de Busca -->
                    <div class="table-responsive">
                      <table border = "1" class="table table-condensed">   
                        <thead>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Valor R$</th>
                            <th>Ações</th>
                        </thead>
                    <tbody>
                    @foreach($produtos as $produto)
                        <tr>
                            <td>{{$produto->nome}} </td>
                            <td>{{$produto->descricao}} </td>
                            <td>R$ {{$produto->custo}} </td>
                            <td>            
                            
                            <!--Botoes-->  
                            <form method = "POST"  action="{{url('/produto/show')}}"  style="display:inline">
                                {{ csrf_field() }}
                                <input type="hidden" name="produto" value="{{$produto->id}}">
                                <input class="btn btn-mini" class="confirm" type="submit" value="Detalhes" />
                            </form>   
                            <form method = "POST"  action="{{url('/produto/edit')}}"  style="display:inline">
                                {{ csrf_field() }}
                                <input type="hidden" name="produto" value="{{$produto->id}}">
                                <input class="btn btn-mini" class="confirm" type="submit" value="Alterar"/>
                            </form>   
                            <form method = "POST"  action="{{url('/produto/delete')}}"  style="display:inline">
                                {{ csrf_field() }}
                                <input type="hidden" name="produto" value="{{$produto->id}}">
                                <input class="btn btn-mini" class="confirm" type="submit" value="Deletar" onclick="clicked(event)"/>
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

