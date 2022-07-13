<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>dona maria</title>
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
</head>

<body>
	<header>
		@include('layouts.includes.menu')
	</header>
	<main>
        @yield('content')
	</main>
    <footer>
        <div class="col-xs-12 col-sm-12 col-md-12 footcopy">
            <div class="wrapper">
                <p class="copytxt">Copyright &copy; 2016 Filipe Silva e Ricardo Carvalho</p>
            </div>
        </div>
    </footer>
</body>
</html>