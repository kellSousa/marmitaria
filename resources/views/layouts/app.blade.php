<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--  =AJX=  -->
    <script src="{!! asset('js/jquery.min.js') !!}"></script>
    <!--  =JS=  -->
    <script src="{!! asset('js/jquery-1.10.2.js') !!}"></script>
    <script src="{!! asset('js/jquery-ui.js') !!}"></script>

    <!-- Fonts -->
    <link href="{!! asset('css/font-awesome4-5.min.css') !!}" rel='stylesheet' type='text/css'>
   
    <link rel="stylesheet" href="{!! asset('css/jquery-ui.css') !!}">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{!! asset('css/jquery-ui.css') !!}" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="{!! asset('css/css.css') !!}">

    <!-- Styles -->
    <link rel="stylesheet" href="{!! asset('css/bootstrap.min.css') !!}" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/home') }}">
                    Marmitaria
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/register') }}">Registrar</a></li>
                        <li><a href="{{ url('/login') }}">Login</a></li>
                    @else
                        @if(Auth::user()->nivelusuario_id == '1')
                        <li><a href="{{ url('/produto') }}">Produto</a></li>
                        <li><a href="{{ url('/empresa') }}">Empresa</a></li>
                        <li><a href="{{ url('/entregador') }}">Entregador</a></li>
                        @endif
                        <li><a href="{{ url('/cliente') }}">Cliente</a></li>
                        <li><a href="{{ url('/pedido') }}">Pedido</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    
    <!-- JavaScripts -->
    <!-- Redirect ^ -->
    <script src="{!! asset('js/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('js/mascaramento.js') !!}"></script>
    <script src="{!! asset('js/jquery.maskMoney.min.js') !!}"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
  <script type="text/javascript">
  $(document).ready(function(){
    $('.cpf').mask('000.000.000-00', {placeholder: "000.000.000-00"}, {reverse: true});
    $('.cnpj').mask('00.000.000/0000-00', {placeholder: "00.000.000/0000-00"}, {reverse: true});
    $('.data').mask("00/00/0000", {placeholder: "__/__/____"});
    $('.cep').mask('00.000-000', {placeholder: "00.000-000"});
    $('.telefoneFixo').mask("(00) 0000-0000",{placeholder:"(00) 0000-0000"});
    $('.celular').mask("(00) 00000-0000",{placeholder:"(00) 00000-0000"});
    $('.hora').mask("00:00h", {placeholder:"00:00"});
    $('.numero').mask('0#');
    $('.valor').maskMoney({symbol:'R$ ', showSymbol:true, thousands:'', decimal:'.', symbolStay: true});
  
  });
  </script>
  </body>
</html>
