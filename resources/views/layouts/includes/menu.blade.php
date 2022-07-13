<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="{{ route('index') }}">
                <img class="navbar-brand" src="{{asset('images/logo.png')}}">
            </a>
            <div class="navbar-right">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="{{ Request::is('empresa') ? 'active' : '' }}"><a class="qfix" href="{{ route('empresa') }}">A Empresa</a></li>
                <li class="{{ Request::is('pedido/create') ? 'active' : '' }}"><a href="{{ route('pedido.create') }}">Fazer<br>Pedido</a></li>
                <li class="{{ Request::is('galeria') ? 'active' : '' }}"><a href="{{ route('galeria') }}">Fotos<br>e Vídeos</a></li>
                <li class="{{ Request::is('comentario', 'comentario/create') ? 'active' : '' }}"><a href="{{ route('comentario.index') }}">Palavras<br>Doces</a></li>
                <li class="{{ Request::is('contactos') ? 'active' : '' }}"><a class="qfix" href="{{ route('contactos') }}">Contactos</a></li>
                @if (Auth::guest())
                    <li class="dropdown fixl">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Login<span class="caret"></span></a>
                        <div id="login-dp" class="row dropdown-menu">
                            <p>Login</p>
                            <div class="col-md-12">
                                <form action="{{ route('login') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label class="rem">
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">
                                            Login
                                        </button>

                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            Forgot Your Password?
                                        </a>
                                    </div>
                                </form>
                            </div>
                            <div class="bottom text-center">
                                <a href="{{ route('register') }}">Não tem conta?</a>
                            </div>
                        </div>
                    </li>
                @else
                    <li class="dropdown fixl">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>