@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <h1>Editar garrafa "{{ $garrafa->nome }}"</h1>
    <h4>Edite a informação pretendida e carregue no botão guardar.</h4>
    <a href="{{URL::route('admingarrafeira.index')}}" class="btn btn-default">Voltar atrás</a>
    <hr>
    <form action="{{route('admingarrafeira.update', $garrafa->idGarrafa)}}" method="POST">
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label for="idGarrafa" class="control-label">ID Garrafa:</label>
            <input type="text" id="idGarrafa" name="idGarrafa" class="form-control" value="{{ $garrafa->idGarrafa }}" readonly>
        </div>
        <div class="form-group">
            <label for="nome" class="control-label">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control" value="{{ $garrafa->nome }}">
        </div>
        <div class="form-group">
            <label for="regiao" class="control-label">Região:</label>
            <input type="text" id="regiao" name="regiao" class="form-control" value="{{ $garrafa->regiao }}">
        </div>
        <div class="form-group">
            <label for="tipo" class="control-label">Tipo:</label>
            <input type="text" id="tipo" name="tipo" class="form-control" value="{{ $garrafa->tipo }}">
        </div>
        <div class="form-group">
            <label for="ano" class="control-label">Ano:</label>
            <input type="number" id="ano" name="ano" class="form-control" value="{{ $garrafa->ano }}">
        </div>
        <div class="form-group">
            <label for="descricao" class="control-label">Descrição:</label>
            <textarea id="descricao" name="descricao" class="form-control" rows="4"><?php echo $garrafa->descricao; ?></textarea>
        </div>
        <div class="form-group">
            <label for="preco" class="control-label">Preço:</label>
            <input type="number" id="preco" name="preco" class="form-control" value="{{ $garrafa->preco }}">
        </div>
        <div class="form-group">
            <label for="img" class="control-label">Imagem:</label>
            <input type="text" id="img" name="img" class="form-control" value="{{ $garrafa->img }}">
        </div>
        <div class="form-group">
            <input type="submit"class="btn btn-primary">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
        </div>
    </form>
</div>
@stop