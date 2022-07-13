@extends('layouts.master')
@section('content')
<div class="container">
    <div class="container-fluid">
        <h1>Editar pedido "{{ $pedido->idPedido }}"</h1>
        <h4>Edite a informação pretendida e carregue no botão guardar.</h4>
        <a href="{{URL::route('pedido.index')}}" class="btn btn-default">Voltar atrás</a>
        <hr>
        <form action="{{route('pedido.update', $pedido->idPedido)}}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <input type="hidden" id="user" name="user" class="form-control" value="{{Auth::id()}}">
            </div>
            <div class="form-group">
                <label for="dia" class="control-label">Dia:</label>
                <input type="date" id="dia" name="dia" class="form-control" value="<?php echo $pedido->dia; ?>" required>
            </div>
            <div class="form-group">
                <label for="hora" class="control-label">Hora:</label>
                <input type="time" id="hora" name="hora" class="form-control" value="<?php echo $pedido->hora; ?>" required>
            </div>
            <div class="form-group">
                <label for="ementa" class="control-label">Ementa:</label>
                <select id="ementa" name="ementa" class="form-control" required>
                    @foreach($ementas as $ementa)
                        @if($ementa->idEmenta == $pedido->ementa)
                            <option value="<?php echo $ementa->idEmenta; ?>" selected><?php echo $ementa->nome; ?></option>
                        @else
                            <option value="<?php echo $ementa->idEmenta; ?>"><?php echo $ementa->nome; ?></option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="garrafa" class="control-label">Garrafa:</label>
                <select id="garrafa" name="garrafa" class="form-control" required>
                    @foreach($garrafas as $garrafa)
                        @if($garrafa->idGarrafa == $pedido->garrafa)
                            <option value="<?php echo $garrafa->idGarrafa; ?>" selected><?php echo $garrafa->nome; ?></option>
                        @else
                            <option value="<?php echo $garrafa->idGarrafa; ?>"><?php echo $garrafa->nome; ?></option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="submit"class="btn btn-danger">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
            </div>
        </form>
    </div>
</div>
@stop