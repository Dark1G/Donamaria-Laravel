@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <h1>Lista de Garrafas</h1>
    <h4>Lista de garrafas registados na base de dados.</h4>
    <a href="{{URL::route('admingarrafeira.create')}}" class="btn btn-default">Adicionar garrafa</a>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nº Garrafa</th>
                    <th>Nome</th>
                    <th>Região</th>
                    <th>Tipo</th>
                    <th>Ano</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Imagem</th>
                    <th>Editar</th>
                    <th>Apagar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($garrafas as $garrafa)
                <tr>
                    <td><?php echo $garrafa->idGarrafa; ?></td>
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

                    <td>
                        <a class="btn btn-warning" href="{{ URL::route('admingarrafeira.edit', $garrafa->idGarrafa) }}"><span class="glyphicon glyphicon-pencil icons"></span></a>
                    </td>
                    <td>
                        <form action="{{ route('admingarrafeira.destroy', $garrafa->idGarrafa) }}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="DELETE">
                            <button name="remover" type="submit" class="btn btn-danger">
                                <span class="glyphicon glyphicon-remove icons"></span>
                            </button>
                        </form>
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel">Atenção</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Tem a certeza que deseja apagar o garrafa?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
                                        <button type="button" class="btn btn-primary" id="apagar">Sim</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    $('button[name="remover"]').on('click', function(e) {
        var $form = $(this).closest('form');
        e.preventDefault();
        $('#myModal').modal({
            backdrop: 'static',
            keyboard: false
        })
        .one('click', '#apagar', function(e) {
            $form.trigger('submit');
        });
    });
</script>
@stop