<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Painel de Administração</title>
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
</head>

<body>
	@if (Auth::check())
		@if ((Auth::user()->perfil ) == 1)
		<header>
			@include('layouts.includes.menu2')
		</header>

		<main class="container">
			@yield('content')
		</main>
		@else
			<script type="text/javascript">
			    window.location = "{{ route('index') }}";
			</script>
		@endif
	@else
		<script type="text/javascript">
			window.location = "{{ route('login') }}";
		</script>
	@endif
</body>
</html>