@extends('layouts.master')
@section('content')
<div class="container">
    <div class="container-fluid">
        <h1>Lista de Garrafas</h1>
        <h4>Lista de garrafas registados na base de dados.</h4>
        <a href="{{URL::route('pedido.create')}}" class="btn btn-default">Voltar a Pedido</a>
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
                    @foreach($garrafas as $garrafa)
                    <tr>
                        <td><?php echo $garrafa->nome; ?></td>
                        <td><?php echo $garrafa->regiao; ?></td>
                        <td><?php echo $garrafa->tipo; ?></td>
                        <td><?php echo $garrafa->ano; ?></td>
                        <td><?php echo $garrafa->descricao; ?></td>
                        <td><?php echo $garrafa->preco; ?>€</td>
                        <td>
                        @if (is_null($garrafa->img))
                            <img src="{{asset('images/garrafa.png')}}" class="admingarraf">
                        @else
                            <img src="<?php echo $garrafa->img; ?>" class="admingarraf">
                        @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop