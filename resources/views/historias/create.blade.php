@extends('adminlte::page')

@section('title', 'Clinica Montalvo')

@section('content_header')
    <h1>Historico Clinico</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        @error('nombre')
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡Error!</strong> Historia ya registrada.
      </div>
         
        @enderror
            <form action="{{route('historias.store')}}" method="post" >
                @csrf
                <div class="form-row">
                     <div class="form-group col-md-6">

                        
                        <h2>Ficha Medica General</h2>

                        <div class="form-group">
                            <label for="gruposanguineo">Grupo Sanguineo:</label>
                            <select name="gruposanguineo"  class="focus border-primary  form-control">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="AB">AB</option>
                                    <option value="O">O</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="estado">Ingresar Paciente</label>
                            <select name="id_paciente"  class="focus border-primary  form-control">
                                @foreach($pacientes as $paciente)
                                    <option value="{{$paciente->id}}">{{$paciente->nombre}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="estado">Ingresar Medico</label>
                            <select name="nombredoctor"  class="focus border-primary  form-control">
                                @foreach($medicos as $medico)
                                    <option value="{{$medico->nombre}}">{{$medico->nombre}}</option>
                                @endforeach
                            </select>
                        </div>

                        <label for="nombre">Ingresar Descripcion</label>
                        <input type="text" name="descripcion" class="form-control"  value="{{old('nombre')}}" id="nombre" required>


                        <label for="nombre">Ingresar Ocupacion</label>
                        <input type="text" name="ocupacion" class="form-control"  value="{{old('nombre')}}" id="nombre" required>

                        <label for="nombre">Ingresar El Motivo De La Consulta</label>
                        <input type="text" name="ultimaconsulta" class="form-control"  value="{{old('nombre')}}" id="nombre" required>
                       
                        <h2>Antecedente Familiar</h2>

                        <div class="form-group">
                            <label for="padre">Padre:</label>
                            <select name="padre"  class="focus border-primary  form-control">
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="madre">Madre:</label>
                            <select name="madre"  class="focus border-primary  form-control">
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                            </select>
                        </div>

                    <h2>Antecedente Patologico</h2>

                        <div class="form-group">
                            <label for="cardiologicos">Cardiologico:</label>
                            <select name="cardiologicos"  class="focus border-primary  form-control">
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="pulmunares">Pulmunar:</label>
                            <select name="pulmunares"  class="focus border-primary  form-control">
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="digestivos">Digestivos:</label>
                            <select name="digestivos"  class="focus border-primary  form-control">
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="diabetes">Diabetes:</label>
                            <select name="diabetes"  class="focus border-primary  form-control">
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="renales">Renales:</label>
                            <select name="renales"  class="focus border-primary  form-control">
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="quirurgicos">Quirurgicos:</label>
                            <select name="quirurgicos"  class="focus border-primary  form-control">
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="alergicos">Alergicos:</label>
                            <select name="alergicos"  class="focus border-primary  form-control">
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="
                            ">Transfuciones:</label>
                            <select name="transfuciones"  class="focus border-primary  form-control">
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="medicamentos">Medicamentos:</label>
                            <select name="medicamentos"  class="focus border-primary  form-control">
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                            </select>
                        </div>


                        <h2>Antecedente No Patologico</h2>

                        <div class="form-group">
                            <label for="alcohol">Alcohol:</label>
                            <select name="alcohol"  class="focus border-primary  form-control">
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tabaquismo">Tabaquismo:</label>
                            <select name="tabaquismo"  class="focus border-primary  form-control">
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="drogas">Drogas:</label>
                            <select name="drogas"  class="focus border-primary  form-control">
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="inmunizaciones">Inmunizaciones:</label>
                            <select name="inmunizaciones"  class="focus border-primary  form-control">
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                            </select>
                        </div>
                        
                        <label for="otros">Otros</label>
                        <input type="text" name="otros" class="form-control"  value="{{old('otros')}}" id="otros" required>

                </div>
                <br>
                <div class="form-group">
                    <button  class="btn btn-primary" type="submit" value="required">Añadir Historial</button>
                    <a class="btn btn-danger" href="{{route('historias.index')}}">Volver</a>
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