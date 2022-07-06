@extends('adminlte::page')

@section('title', 'Clinica Montalvo')

@section('content_header')
    <h1>Editar Chofer</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
            <form action="{{route('medicos.update', $medico)}}" method="post"  >
                @csrf
                @method('put')
                <label for="nombre">Editar nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{old('nombre', $medico->nombre)}}" required><br>
                
                <label for="telefono">Editar Telefono</label>
                <input type="text" name="telefono" class="form-control" value="{{old('telefono', $medico->telefono)}}" required><br>
               
                <br><br>      
                
                                                      

                <button  class="btn btn-danger btn-sm" type="submit">Actualizar datos</button>
                <a class="btn btn-primary btn-sm" href="{{route('medicos.index')}}">Volver</a>
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