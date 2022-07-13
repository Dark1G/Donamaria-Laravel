@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <h1>Adicionar um nova garrafa</h1>
    <h4>Insira toda a informação sobre a garrafa.</h4>
    <a href="{{URL::route('admingarrafeira.index')}}" class="btn btn-default">Voltar atrás</a>
    <hr>

    <form action="{{URL::route('admingarrafeira.store')}}" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nome" class="control-label">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="regiao" class="control-label">Região:</label>
            <input type="text" id="regiao" name="regiao" class="form-control">
        </div>
        <div class="form-group">
            <label for="tipo" class="control-label">Tipo:</label>
            <input type="text" id="tipo" name="tipo" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="ano" class="control-label">Ano:</label>
            <input type="number" id="ano" name="ano" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="descricao" class="control-label">Descrição:</label>
            <textarea id="descricao" name="descricao" class="form-control" rows="4"></textarea>
        </div>
        <div class="form-group">
            <label for="preco" class="control-label">Preço:</label>
            <input type="number" id="preco" name="preco" class="form-control">
        </div>
        <div class="form-group">
            <label for="img" class="control-label">Imagem:</label>
            <input type="file" name="img" id="img" accept="/image" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Inserir">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
        </div>
    </form>
</div>
@stop