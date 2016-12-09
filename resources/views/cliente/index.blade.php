@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-danger">
        <div class="panel-heading">CLIENTE</div>
        <!--Um novo painel-->
         <div class="panel-body">
             <form class="form-horizontal" method="POST" action="{{url('cliente')}}" style="display:inline"> 
              {{ csrf_field() }}  
              <div class="form-group">
                  <div class="col-md-6">
                        <div class="col-lg-10">
                        <div class="input-group">
                        <input class="form-control" placeholder="Buscar Cliente..." name="pesq" type="text" >
                      <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit">Buscar</button>
                          </span>
                </div>
                </div>  
               </div>
           </div>
           <h4>Adicione um Novo Cliente</h4>
        @if(isset($pedido))
        <a class="btn btn-primary" href="{{url('/pedido_addCliente')}}" title="Adicionar Cliente" ><i class="glyphicon glyphicon-plus" aria-hidden="true"></i></a>
        @else
        <a class="btn btn-primary" href="{{url('/cliente_create')}}" title="Adicionar Cliente" ><i class="glyphicon glyphicon-plus" aria-hidden="true"></i></a>

                @endif

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
                        <th class="danger">Celular</th>
                        <th class="danger">Endereço</th>
                        <th class="danger">Ações</th>

                    </thead>
                    <tbody>
                    @foreach($clientes as $cliente)
                        <tr>
                            <td>{{$cliente->nome}} </td>
                            <td>{{$cliente->telefone}} </td>
                            <td>{{$cliente->endereco}} </td>
                            <td>            
                            <div>
                            <!--Botoes-->             
                            <form method = "POST"  action="{{url('/cliente_show')}}"  style="display:inline">
                                {{ csrf_field() }}
                                <input type="hidden" name="cliente" value="{{$cliente->id}}">
                                <button class="btn btn-mini" class="confirm" type="submit" title="Detalhes"><i class="glyphicon glyphicon-th-list" aria-hidden="true"></i></button>
                            </form> 
                            <form method = "POST"  action="{{url('/cliente_edit')}}"  style="display:inline">
                                {{ csrf_field() }}
                                <input type="hidden" name="cliente" value="{{$cliente->id}}">
                                <button class="btn btn-mini" class="confirm" type="submit" tilte="Alterar"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></button>
                            </form> 
                            <form method = "POST"  action="{{url('/cliente_delete')}}"  style="display:inline">
                                {{ csrf_field() }}
                                <input type="hidden" name="cliente" value="{{$cliente->id}}">
                                <button class="btn btn-mini" class="confirm" type="submit" onclick="clicked(event)" tilte="Deletar"><i class="glyphicon glyphicon-remove" aria-hidden="true"></i></button>
                            </form> 
                            <form method = "POST"  action="{{url('/pedido_create')}}"  style="display:inline">
                                {{ csrf_field() }}
                                <input type="hidden" name="cliente" value="{{$cliente->id}}">
                                <button class="btn btn-mini" class="confirm" type="submit" title="Adicionar pedido "><i class="glyphicon glyphicon-plus" aria-hidden="true"></i><i class="glyphicon glyphicon-cutlery" aria-hidden="true"></i></button>
                            </form>                
                            </div> 
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
                @endsection
                <script>
                    function clicked(e) {
                        if(!confirm('Deseja deletar este cliente?'))e.preventDefault();
                    }
                </script>
</div>
</div>
</div>
</div>