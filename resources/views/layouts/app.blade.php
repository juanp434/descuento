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

    
</head>
<body id="app-layout">
    <nav class="navbar navbar-default">
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
                <a class="navbar-brand" href="{{ url('/') }}">
                    Logo
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav" id="menu">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="promociones">Promociones</a></li>
                    <li><a href="comercios">Comercios Adheridos</a></li>
                    <li><a href="alta-comercio">Agrega tu comercio</a></li>
                    <li><a href="alta-promocion">Agregar promocion</a></li>
                    <li><a class="dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Admin<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="/lista-usuarios">Alta Usuarios</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="/lista-comercios">Alta comercios</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="/lista-promociones">Alta promociones</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="/Denuncia-voucher">Denuncias Gastos</a></li>
                        </ul>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a data-toggle="modal" data-target="#Modal">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
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
    <!-- Modal -->
        <div id="Modal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Login</h4>
              </div>
              <div class="modal-body1">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                    {!! csrf_field() !!}
                    <div class="login">
                        <label class="control-label col-md-4">Tipo usuario</label>
                            <select name="select">
                              <option value="user" selected="1">Usuario</option>
                              <option value="shop">Comercio</option>
                            </select>
                    </div>
                    <div class="login">
                        <label class="control-label col-md-4">E-Mail Address</label>
                        <input type="email" class="" name="email" value="{{ old('email') }}">
                    </div>
                    <div class="login">
                        <label class="control-label col-md-4">Password</label>
                        <input type="password" class="" name="password">
                    </div>
                    <div class="login">
                        <label class="col-md-12 col-md-offset-4">
                                <input type="checkbox" name="remember"> Remember Me
                        </label>
                    </div>
                    <div class="login">
                        <button type="submit" class="btn btn-primary col-md-offset-2">Login </button>
                          
                        <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>  
    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
<footer>Footer</footer>
</body>
</html>
