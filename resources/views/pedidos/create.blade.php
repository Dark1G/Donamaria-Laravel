@extends('layouts.master')
@section('content')

@if (Auth::guest())
    @include('auth.login')
@else
<div class="container">
    <div class="container-fluid">
        <h1 class="titemp">Fazer pedido</h1>
        <h4 class="lead subtit">Faça o seu pedido de refeição aqui.</h4>
        <a href="{{URL::route('ementa.index')}}" class="btn btn-default">Lista de ementas</a>
        <a href="{{URL::route('garrafeira.index')}}" class="btn btn-default">Lista de Garrafas</a>
        </br>
        </br>
        <a href="{{URL::route('pedido.index')}}" class="btn btn-default">Os meus pedidos</a>
        <hr>

        <form action="{{URL::route('pedido.store')}}" method="POST">
            <div class="form-group">
                <input type="hidden" id="user" name="user" class="form-control" value="{{Auth::id()}}">
            </div>
            <div class="form-group">
                <label for="dia" class="control-label">Dia:</label>
                <input type="date" id="dia" name="dia" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="hora" class="control-label">Hora:</label>
                <input type="time" id="hora" name="hora" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="ementa" class="control-label">Ementa:</label>
                <select id="ementa" name="ementa" class="form-control" required>
                    @foreach($ementas as $ementa)
                        <option value="<?php echo $ementa->idEmenta; ?>"><?php echo $ementa->nome; ?></option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="garrafa" class="control-label">Garrafa:</label>
                <select id="garrafa" name="garrafa" class="form-control" required>
                    @foreach($garrafas as $garrafa)
                        <option value="<?php echo $garrafa->idGarrafa; ?>"><?php echo $garrafa->nome; ?></option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-danger" value="Fazer pedido">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
            </div>
        </form>
        <hr class="linha">
    </div>
</div>
@endif
@stop