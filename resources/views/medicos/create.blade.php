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
            <form action="{{route('medicos.store')}}" method="post" >
                @csrf
                <div class="form-row">
                     <div class="form-group col-md-6">


                    
                        <label for="nombre">Ingresar Nombre</label>
                        <input type="text" name="nombre" class="form-control"  value="{{old('nombre')}}" id="nombre" required>

                        <label for="telefono">Ingresar Carnet</label>
                        <input type="number" name="telefono" class="form-control"  value="{{old('telefono')}}" id="telefono" required>

                        <div>
                            <label for="sexo">Seleccione un Genero</label>
                            <select name="sexo" id="select-roles" class="form-control" onchange="habilitar()" >
                                    
                                        <option value="Masculino">Masculino</option>
                                        <option value="Feminino">Femenino</option>
                                    
                            </select>
                        </div>

                        <label for="email">ingresar Email</label>
                        <input type="text" name="email" class="form-control"  value="{{old('email')}}" id="email" required>

                        <label for="password">Ingresar Contraseña</label>
                        <input type="text" name="password" class="form-control"  value="{{old('password')}}" id="password" required>

                        <label for="especialidad">Ingresar Fecha de naciento</label>
                        <input type="date" name="especialidad" class="form-control"  value="{{old('password')}}" id="password" required>
                        
                    
                    </div>

                   

                    
                
           
                    
                </div>
                <div class="form-group">
                    <button  class="btn btn-primary" type="submit" value="required">Añadir Chofer</button>
                    <a class="btn btn-danger" href="{{route('medicos.index')}}">Volver</a>
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