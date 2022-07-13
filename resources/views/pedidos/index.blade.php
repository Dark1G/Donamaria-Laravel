@extends('layouts.master')
@section('content')
<div class="container">
    <div class="container-fluid">
        <h1 class="titemp">Lista de Pedidos</h1>
        <h4 class="lead subtit">Lista dos seus pedidos registados na base de dados.</h4>
        <a href="{{URL::route('pedido.create')}}" class="btn btn-default">Fazer pedido</a>
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
                        <th>Editar</th>
                        <th>Apagar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pedidos as $pedido)
                        @if(Auth::id()==$pedido->user->id)
                        <tr>
                            <td><?php echo $pedido->idPedido; ?></td>
                            <td><?php echo $pedido->user->name; ?></td>
                            <td><?php echo $pedido->dia; ?></td>
                            <td><?php echo $pedido->hora; ?></td>
                            <td><?php echo $pedido->ementa->nome; ?></td>
                            <td><?php echo $pedido->garrafa->nome; ?></td>

                            <td>
                                <a class="btn btn-warning" href="{{ URL::route('pedido.edit', $pedido->idPedido) }}"><span class="glyphicon glyphicon-pencil icons"></span></a>
                            </td>

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
                        @else
                            <tr>
                                <td colspan="8">Nunca efetuou nunhum pedido</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
            <hr>
            <hr class="linha">
        </div>
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