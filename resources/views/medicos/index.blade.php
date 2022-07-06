@extends('adminlte::page')

@section('title', 'Tu Mejor Ruta')

@section('content_header')
    <h1>Lista Choferes</h1>
@stop
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
    <div class="card">
        <div class="card-header">

            <a class="btn btn-primary" href="{{ route('medicos.create') }}">Registrar Chofer</a>

        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered shadow-lg mt-4" id="medicos">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre de Chofer</th>
                        <th scope="col">Carnet</th>
                        <th scope="col">Sexo</th>
                        <th scope="col">Fecha de nacimiento</th>
                        <th scope="col">Opciones</th>

                    </tr>
                </thead>
                <tbody>
                   
                    @foreach ($medicos as $medico)
                    <tr>
                        <td>{{ $medico->id }}</td>
                        <td>{{ $medico->nombre  }}</td>
                        <td>{{ $medico->carnet }}</td>
                        <td>{{ $medico->sexo }}</td>
                        <td>{{ $medico->fecha_de_nacimiento}}</td>   

                        @foreach ($especialidades as $especialidad)
                            @if ($medico->id == $especialidad->id_medico)
                                <td>{{ $especialidad->nombre }}</td>
                            @endif
                        @endforeach



                        <td>

                            <a class="btn btn-primary btn-sm" style="margin-top: 5px"
                                href="{{ route('medicos.edit', $medico) }}"><i class="fas fa-pencil-alt"></i> Editar</a>

                            <form action="{{ route('medicos.destroy', $medico) }}" method="POST">
                                @csrf
                                @method('delete')

                                <button class="btn btn-danger btn-sm" style="margin-top: 0.35rem"
                                    onclick="return confirm('¿ESTÁ SEGURO DE BORRAR?')" value="Borrar"><i
                                        class="fas fa-trash"></i> Eliminar</button>

                            </form>

                        </td>

                    </tr> 
                    @endforeach
               
                </tbody>
            </table>

        </div>
    </div>
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $('#medicos').DataTable({
            autoWidth: false
        });
    </script>
@endsection
