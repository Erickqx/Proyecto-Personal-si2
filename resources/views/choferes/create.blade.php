@extends('adminlte::page')

@section('title', 'Tu Mejor Ruta')

@section('content_header')
    <h1>Chofer de Micro</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @error('nombre')
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>¡Error!</strong> chofer ya registrado.
                </div>
            @enderror
            <form action="{{ route('choferes.store') }}" method="post">
                @csrf

                <div class="row" style="padding-bottom: 1rem">
                    <div class="col-md-6">
                        <label for="nombre">Nombre de Chofer</label>
                        <input type="text" name="nombre" class="form-control" value="" id="nombre" required>
                    </div>
                    <div class="col-md-6">
                        <label for="ci">CI</label>
                        <input type="number" name="ci" class="form-control" value="" id="ci" required>
                    </div>
                </div>

                <div class="row" style="padding-bottom: 1rem">
                    <div class="col-md-6">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" value="" id="email" required>
                    </div>
                    <div class="col-md-6">
                        <label for="password">Contraseña</label>
                        <input type="text" name="password" class="form-control" value="" id="password" required>
                    </div>
                </div>

                <div class="row" style="padding-bottom: 1rem">
                    <div class="col-md-4">
                        <label for="sexo">Sexo</label>
                        <select name="sexo" id="sexo" class="form-control" onchange="habilitar()">

                            <option value="Masculino">Masculino</option>
                            <option value="Feminino">Femenino</option>

                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="fecha_nac">Fecha de Nacimiento</label>
                        <input type="date" name="fecha_nac" class="form-control" value="" id="fecha_nac" required>
                    </div>
                    <div class="col-md-4">
                        <label for="telefono">Telefono</label>
                        <input type="number" name="telefono" class="form-control" value="" id="telefono" required>
                    </div>
                </div>

                <br>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit" value="required">Añadir Chofer</button>
                    <a class="btn btn-danger" href="{{ route('medicos.index') }}">Volver</a>
                </div>

            </form>

        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
