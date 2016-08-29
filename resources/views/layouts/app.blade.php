<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('title')

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
        
    <link rel="stylesheet" href="css/style.css">

     <!-- JavaScripts -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
    

<body id="app-layout">
    <header><img src="images/logo.png" style="padding: 5px; width: 192px;"></header>
    <nav class="navbar navbar-default">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                Descuentos
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav" id="menu">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('promociones') }}">Promociones</a></li>
                <li><a href="{{ url('comercios') }}">Comercios Adheridos</a></li>

            @if (Auth::check())
               
                @if (Auth::user()->role == 'user')
                <li><a href="vouchers">Comprobantes</a></li>
                @endif
               
                @if (Auth::user()->role == 'shop' )
                <li><a class="dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Comercio<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1" id="menu-list">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ url('alta-promocion') }}"> Alta Promocion</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ url('alta-voucher') }}"> Alta Comprobante</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ url('liquidaciones') }}"> Liquidaciones</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ url('gastos-denunciados') }}">Gastos denunciados</a></li>
                    </ul>
                </li>
               @endif
               @if (Auth::user()->role == 'admin' || Auth::user()->role == 'admin')
                <li><a class="dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Admin<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ url('lista-usuarios') }}">Aprovar Usuarios</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ url('lista-comercios') }}">Aprovar comercios</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ url('lista-promociones') }}">Aprovar promociones</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ url('lista-vouchers') }}">  Comprobantes</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ url('lista-gastos-denunciados') }}">Denuncias Gastos</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ url('generar-liquidacion') }}">Generar Liquidaciones</a></li>
                    </ul>
                </li>
                @endif
            @endif
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a data-toggle="modal" data-target="#Modal" href="#modal"><span class="glyphicon glyphicon-user"> Login</a></li>
                    <li><a href="{{ url('/register') }}"><span class="glyphicon glyphicon-log-in"> Registrarse</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a>Rol: {{Auth::user()->role}}<a></li>
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
    <!-- Modal -->
        <div id="Modal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center">Login</h4>
              </div>
              <div class="modal-body1">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                    {!! csrf_field() !!}
                    <div class="login">
                        <label class="control-label col-md-4">E-Mail Address</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                    </div>
                    <div class="login">
                        <label class="control-label col-md-4">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="login text-center">
                        <button type="submit" class="btn btn-primary">Login </button>
                    </div>
                    <div class="login text-center">
                        <input type="checkbox" name="remember">Remember Me</input>
                    </div>
                    <div class="login text-center">
                        <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                    </div>      
                </form>
              </div>
            </div>
          </div>
        </div>  
    @yield('content')

   
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

<footer>
    <h4>Descuentos</h4>
    <div class="footer-col">
        <div><a href="{{ url('/') }}">Home</a></div>
        <div><a href="{{ url('comercios') }}">Comercios Adheridos</a></div>
        <div><a href="{{ url('promociones') }}">Promociones</a></div>
    </div>
    <div class="footer-col">
        <div><a href="">Terminos</a></div>
        <div><a href="">Condiciones</a></div>
        <div><a href="">Sobre Nosotros</a></div>
    </div>
    <div class="footer-col">
        <div><a data-toggle="modal" data-target="#Modal" href="#modal">Login</a></div>
        <div><a href="{{ url('register') }}">Registrate</a></div>
        <div><a href="{{ url('nuevo-comercio') }}">Registra tu comercio</a></div>
    </div>
    <div class="text-left">© 2016 Descuentos, Inc. Todos los derechos reservados.</div>
</footer>
</body>
</html>
