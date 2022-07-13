@extends('layouts.master')
@section('content')
<div class="container">
    <div class="container-fluid">
        <h1>Lista de Ementas</h1>
        <h4>Lista de ementas registados na base de dados.</h4>
        <a href="{{URL::route('pedido.create')}}" class="btn btn-default">Voltar a Pedido</a>
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
                    @foreach($ementas as $ementa)
                    <tr>
                        <td><?php echo $ementa->nome; ?></td>
                        <td><?php echo $ementa->descricao; ?></td>
                        <td><?php echo $ementa->preco; ?>€</td>
                        <td>
                            @if (is_null($ementa->img))
                                <img src="{{asset('images/untitled-1.png')}}" class="adminmenu">
                            @else
                                <img src="<?php echo $ementa->img; ?>" class="adminmenu">
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