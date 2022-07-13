@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <h1>Detalhes da Ementa</h1>
    <h4>Detalhes da ementa registada na base de dados.</h4>
    <a href="{{URL::route('pedido.create')}}" class="btn btn-default">Voltar ao pedido</a>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Imagem</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $ementa->nome; ?></td>
                    <td><?php echo $ementa->descricao; ?></td>
                    <td><?php echo $ementa->preco; ?>€</td>
                    <td><img src="<?php echo $ementa->img; ?>" class="adminmenu"></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@stop