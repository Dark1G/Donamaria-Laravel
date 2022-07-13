@extends('layouts.master')
@section('content')
@if (Auth::check())
<div class="container">
    <div class="container-fluid">
        <h1 class="titemp">Editar comentário de "{{ $comentario->user }}"</h1>
        <h4 class="lead subtit">Edite a informação pretendida e carregue no botão guardar.</h4>
        <a href="{{URL::route('comentario.index')}}" class="btn btn-default">Voltar atrás</a>
        <hr>
        <form action="{{route('comentario.update', $comentario->idComentario)}}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <input type="hidden" id="user" name="user" class="form-control" value="<?php echo $comentario->user; ?>">
            </div>
            <div class="form-group">
                <label for="mensagem" class="control-label">Comentário:</label>
                <textarea id="mensagem" name="mensagem" class="form-control" rows="4"><?php echo $comentario->mensagem; ?></textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-danger">
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