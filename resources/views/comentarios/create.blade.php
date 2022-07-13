@extends('layouts.master')
@section('content')
@if (Auth::check())
<div class="container">
    <div class="container-fluid">
        <h1 class="titemp">Escreva um comentário</h1>
        <h4 class="lead subtit">Dê a sua opinião à cerca dos nossos serviços.</h4>
        <a href="{{URL::route('comentario.index')}}" class="btn btn-default">Voltar atrás</a>
        <hr>

        <form action="{{URL::route('comentario.store')}}" method="POST">
            <div class="form-group">
                <input type="hidden" id="user" name="user" class="form-control" value="{{Auth::id()}}">
            </div>
            <div class="form-group">
                <label for="mensagem" class="control-label">Comentário:</label>
                <textarea id="mensagem" name="mensagem" class="form-control" rows="4"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-danger" value="Comentar">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
            </div>
        </form>
        <hr class="linha">
    </div>
</div>
@else
    @include('auth.login')
@endif
@stop