@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <h1>Detalhes de Garrafa</h1>
    <h4>Detalhes de garrafa registados na base de dados.</h4>
    <a href="{{URL::route('pedido.create')}}" class="btn btn-default">Voltar ao pedido</a>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Região</th>
                    <th>Tipo</th>
                    <th>Ano</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Imagem</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $garrafa->nome; ?></td>
                    <td><?php echo $garrafa->regiao; ?></td>
                    <td><?php echo $garrafa->tipo; ?></td>
                    <td><?php echo $garrafa->ano; ?></td>
                    <td><?php echo $garrafa->descricao; ?></td>
                    <td><?php echo $garrafa->preco; ?>€</td>
                    <td><img src="<?php echo $garrafa->img; ?>" class="admingarraf"></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@stop