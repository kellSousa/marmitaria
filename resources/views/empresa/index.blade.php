@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-success">
        <div class="panel-heading">Empresa</div>
        <!--Um novo painel-->
          <div class="panel-body">

             <form class="form-horizontal" method="POST" action="{{url('empresa')}}" style="display:inline"> 
              {{ csrf_field() }}       
                <div class="form-group">
                  <div class="col-md-6">
                        <div class="col-lg-10">
                        <div class="input-group">
                        <input class="form-control" placeholder="Buscar Empresa..." name="pesq" type="text" >
                      <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit">Buscar</button>
                          </span>
                </div>
                </div>  
               </div>
           </div>
             </form>

        
        <a class="btn btn-primary" href="{{url('/empresa/create')}}"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i> Adicionar Empresa </a>

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
        <table class="table">
            <thead>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Ações</th>

            </thead>
            <tbody>
            @foreach($empresas as $empresa)
                <tr>
                    <td>{{$empresa->nome}} </td>
                    <td>{{$empresa->telefone}} </td>
                    <td>            
                    <div>
                    <!--Botoes-->     
                    <form method = "POST"  action="{{url('/empresa/show')}}"  style="display:inline">
                        {{ csrf_field() }}
                        <input type="hidden" name="empresa" value="{{$empresa->id}}">
                        <input class="confirm" type="submit" value="Detalhes" />
                    </form>  
                    <form method = "POST"  action="{{url('/empresa/edit')}}"  style="display:inline">
                        {{ csrf_field() }}
                        <input type="hidden" name="empresa" value="{{$empresa->id}}">
                        <input class="confirm" type="submit" value="Alterar" />
                    </form>  
                    <form method = "POST"  action="{{url('/empresa/addEntregador')}}"  style="display:inline">
                        {{ csrf_field() }}
                        <input type="hidden" name="empresa" value="{{$empresa->id}}">
                        <input class="confirm" type="submit" value="Add Entregador" />
                    </form>  
                    <form method = "POST"  action="{{url('/empresa/delete')}}"  style="display:inline">
                        {{ csrf_field() }}
                        <input type="hidden" name="empresa" value="{{$empresa->id}}">
                        <input class="confirm" type="submit" value="Deletar" onclick="clicked(event)"/>
                    </form>                
                    </div> 
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
                if(!confirm('Deseja deletar está empresa?'))e.preventDefault();
            }
        </script>