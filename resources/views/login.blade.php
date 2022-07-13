@extends('layouts.admin')
@section('content')
@if (Auth::guest())
    @include('auth.login')
@else
<div class="container-fluid">
    <h1>Bem-vindo ao sistema de gestão Dona Maria</h1>
    <h4>Tenha em atenção pois todas as acções que fizer puderão ser permanentes..</h4>
    <hr>
    <div class="row placeholders">
        <div class="placeholder">
            <img src="{{ asset('images/logo.png') }}" class="img-responsive imghome" alt="Generic placeholder thumbnail">
        </div>
    </div>
</div>
@endif
@stop