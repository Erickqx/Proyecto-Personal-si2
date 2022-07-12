@extends('adminlte::page')

@section('title', 'Clinica Montalvo')

@section('content_header')
    <h1>Editar Chofer</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('choferes.update', $chofer) }}" method="post">
                @csrf
                @method('put')

                <div class="row" style="padding-bottom: 1rem">
                    <div class="col-md-6">
                        <label for="nombre">Nombre de Chofer</label>
                        <input type="text" name="nombre" class="form-control"
                            value="{{ old('nombre', $chofer->nombre) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="ci">CI</label>
                        <input type="text" name="ci" class="form-control" value="{{ old('ci', $chofer->ci) }}"
                            required>
                    </div>
                </div>

                <div class="row" style="padding-bottom: 1rem">
                    <div class="col-md-6">
                        <label for="telefono">Telefono</label>
                        <input type="number" name="telefono" class="form-control"
                            value="{{ old('telefono', $chofer->telefono) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="sexo">Sexo</label>
                        <input type="text" name="sexo" class="form-control" value="{{ old('sexo', $chofer->sexo) }}"
                            required>
                    </div>
                </div>

                <div class="row" style="padding-bottom: 1rem">
                    <div class="col-md-12">
                        <label for="fecha_nac">Fecha de Nacimiento</label>
                        <input type="date" name="fecha_nac" class="form-control"
                            value="{{ old('fecha_nac', $chofer->fecha_nac) }}" required>
                    </div>
                </div>

                <br><br>
                <button class="btn btn-danger btn-sm" type="submit">Actualizar datos</button>
                <a class="btn btn-primary btn-sm" href="{{ route('choferes.index') }}">Volver</a>
            </form>


        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
