@extends('layouts.master')
@section('content')
<div class="container">
    <div class="container-fluid">
        <h1 class="titemp">Palavras Doces</h1>
        <h4 class=" lead subtit">Aqui está a opinião geral dos nossos clientes.</h4>
        @if(Auth::check())
            <a href="{{URL::route('comentario.create')}}" class="btn btn-danger">Escrever comentário</a>
        @endif
        <hr>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    @foreach($comentarios as $comentario)
                    <tr>
                        <td>
                            <p><?php echo $comentario->user->name; ?></p>
                            <p><?php echo $comentario->mensagem; ?></p>
                        </td>
                        
                        <td>
                            @if(Auth::id()==$comentario->user->id)
                                <a class="btn btn-warning" href="{{ URL::route('comentario.edit', $comentario->idComentario) }}"><span class="glyphicon glyphicon-pencil icons"></span></a>
                            @endif
                        </td>
                        <td>
                            @if ((Auth::check()) AND ((Auth::id()==$comentario->user->id) OR ((Auth::user()->perfil ) == 1)))
                                <form action="{{ route('comentario.destroy', $comentario->idComentario) }}" method="POST">
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
                                                <p>Tem a certeza que deseja apagar o seu comentário?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
                                                <button type="button" class="btn btn-primary" id="apagar">Sim</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </td>
                    </tr>
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