@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <h1>Editar ementa "{{ $ementa->nome }}"</h1>
    <h4>Edite a informação pretendida e carregue no botão guardar.</h4>
    <a href="{{URL::route('adminementa.index')}}" class="btn btn-default">Voltar atrás</a>
    <hr>
    <form action="{{route('adminementa.update', $ementa->idEmenta)}}" method="POST">
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label for="idEmenta" class="control-label">ID Modelo:</label>
            <input type="text" id="idEmenta" name="idEmenta" class="form-control" value="{{ $ementa->idEmenta }}" readonly>
        </div>
        <div class="form-group">
            <label for="nome" class="control-label">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control" value="{{ $ementa->nome }}">
        </div>
        <div class="form-group">
            <label for="descricao" class="control-label">Descrição:</label>
            <textarea id="descricao" name="descricao" class="form-control" rows="4"><?php echo $ementa->descricao; ?></textarea>
        </div>
        <div class="form-group">
            <label for="preco" class="control-label">Preço:</label>
            <input type="number" id="preco" name="preco" class="form-control" value="{{ $ementa->preco }}">
        </div>
        <div class="form-group">
            <label for="img" class="control-label">Imagem:</label>
            <input type="text" id="img" name="img" class="form-control" value="{{ $ementa->img }}">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
        </div>
    </form>
</div>
@stop