<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<a href="{{ route('admin') }}">
				<p class="navbar-brand">Painel de Administração</p>
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
			@if ((Auth::check()) AND ((Auth::user()->perfil ) == 1))
				<li><a href="{{ route('admin') }}">Home</a></li>
				<li><a href="{{ route('utilizador.index')}}">Utilizadores</a></li>
				<li><a href="{{ route('admincomentario.index')}}">Comentários</a></li>
				<li><a href="{{ route('adminpedido.index')}}">Pedidos</a></li>
				<li><a href="{{ route('adminementa.index') }}">Ementas</a></li>
				<li><a href="{{ route('admingarrafeira.index') }}">Garrafeira</a></li>
			@endif
			</ul>
		</div>
	</div>
</nav>