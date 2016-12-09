@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-danger">
        <div class="panel-heading">ENTREGADOR</div>
        <!--Um novo painel-->
          <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{url('entregador')}}" style="display:inline"> 
              {{ csrf_field() }}        
              <div class="form-group">
                  <div class="col-md-6">
                        <div class="col-lg-10">
                        <div class="input-group">
                        <input class="form-control" placeholder="Buscar Entregador..." name="pesq" type="text" >
                      <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit">Buscar</button>
                          </span>
                </div>
                </div>  
               </div>
           </div>
           <h4>Adicione um Novo Entregador / Lista de Entregas</h4>
        <a class="btn btn-danger" href="{{url('/entregador_create')}}" title="Adicionar Entregador"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i></a>
        <a class="btn btn-danger" href="{{url('/entregador_entregas')}}"> Entregas Realizadas </a>
             </form>

             <br><br>
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
                        <th class="danger">Ações</th>

                    </thead>
                    <tbody>
                    @foreach($entregadores as $entregador)
                        <tr>
                            <td>{{$entregador->nome}} </td>
                            <td>{{$entregador->celular}} </td>
                            <td>            
                            <div>
                            <!--Botoes-->    
                            <form method = "POST"  action="{{url('/entregador_show')}}"  style="display:inline">
                                {{ csrf_field() }}
                                <input type="hidden" name="entregador" value="{{$entregador->id}}">
                                <button class="btn btn-mini" class="confirm" type="submit" title="Detalhes"><i class="glyphicon glyphicon-th-list" aria-hidden="true"></i></button>
                            </form>  
                            <form method = "POST"  action="{{url('/entregador_edit')}}"  style="display:inline">
                                {{ csrf_field() }}
                                <input type="hidden" name="entregador" value="{{$entregador->id}}">
                                <button class="btn btn-mini" class="confirm" type="submit" title="Alterar"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></button>
                            </form>  
                            <form method = "POST"  action="{{url('/entregador_delete')}}"  style="display:inline">
                                {{ csrf_field() }}
                                <input type="hidden" name="entregador" value="{{$entregador->id}}">
                                <button class="btn btn-mini" class="confirm" type="submit" title="Deletar" onclick="clicked(event)"><i class="glyphicon glyphicon-remove" aria-hidden="true"></i></button>
                                
                            </form>  
                            </div> 
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                @endsection
                <script>
                function clicked(e) {
                        if(!confirm('Deseja deletar este entregador ?'))e.preventDefault();
                    }
                </script>
</div>
</div>
</div>
</div>