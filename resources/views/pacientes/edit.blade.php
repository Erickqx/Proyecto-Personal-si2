@extends('adminlte::page')

@section('title', 'Clinica Montalvo')

@section('content_header')
    <h1>Editar Paciente</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
            <form action="{{route('pacientes.update', $paciente)}}" method="post"  >
                @csrf
                @method('put')


                <label for="ci">Editar CI</label>
                <input type="text" name="ci" class="form-control" value="{{old('ci', $paciente->ci)}}" required><br>

                <label for="nombre">Editar Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{old('nombre', $paciente->nombre)}}" required><br>

                <label for="sexo">Editar Sexo</label>
                <input type="text" name="sexo" class="form-control" value="{{old('email', $paciente->sexo)}}" required><br>

                <label for="telefono">Editar Telefono</label>
                <input type="text" name="telefono" class="form-control" value="{{old('telefono', $paciente->telefono)}}" required><br>

                <label for="direccion">Editar Direccion</label>
                <input type="text" name="direccion" class="form-control" value="{{old('telefono', $paciente->direccion)}}" required><br>
               
                <br>                                    

                <button  class="btn btn-danger btn-sm" type="submit">Actualizar datos</button>
                <a class="btn btn-primary btn-sm" href="{{route('pacientes.index')}}">Volver</a>
            </form> 
            
            
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop