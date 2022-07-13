@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <h1>Editar o utilizador "{{ $user->name }}"</h1>
    <h4>Edite a informação pretendida e carregue no botão guardar.</h4>
    <a href="{{URL::route('utilizador.index')}}" class="btn btn-default">Voltar atrás</a>
    <hr>
    <form action="{{route('utilizador.update', $user->id)}}" method="POST">
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label for="id" class="control-label">ID Utilizador:</label>
            <input type="text" id="id" name="id" class="form-control" value="{{ $user->id }}" readonly>
        </div>
        <div class="form-group">
            <label for="perfil" class="control-label">Perfil:</label><br>
            <input type="radio" id="perfil" name="perfil" value="1"> Adiministrador<br>
            <input type="radio" id="perfil" name="perfil" value="2"> Moderador<br>
            <input type="radio" id="perfil" name="perfil" value="3"> Cliente 
        </div>
        <div class="form-group">
            <label for="name" class="control-label">Nome:</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}" readonly>
        </div>
        <div class="form-group">
            <label for="email" class="control-label">Email:</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}" readonly>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
        </div>
    </form>
</div>
@stop