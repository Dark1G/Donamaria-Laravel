@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <h1>Lista de Pedidos</h1>
    <h4>Lista de pedidos registados na base de dados.</h4>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nº Pedido</th>
                    <th>Utilizador</th>
                    <th>Dia</th>
                    <th>Hora</th>
                    <th>Ementa</th>
                    <th>Garrafa</th>
                    <th>Apagar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pedidos as $pedido)
                <tr>
                    <td><?php echo $pedido->idPedido; ?></td>
                    <td><?php echo $pedido->user->name; ?></td>
                    <td><?php echo $pedido->dia; ?></td>
                    <td><?php echo $pedido->hora; ?></td>
                    <td><?php echo $pedido->ementa->nome; ?></td>
                    <td><?php echo $pedido->garrafa->nome; ?></td>

                    <td>
                        <form action="{{ route('pedido.destroy', $pedido->idPedido) }}" method="POST">
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
                                        <p>Tem a certeza que deseja apagar o veículo?</p>
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