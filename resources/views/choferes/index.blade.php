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

            <a class="btn btn-primary" href="{{ route('choferes.create') }}">Registrar Chofer</a>

        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered shadow-lg mt-4" id="choferes">
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

                    @foreach ($choferes as $chofer)
                        <tr>
                            <td>{{ $chofer->id }}</td>
                            <td>{{ $chofer->nombre }}</td>
                            <td>{{ $chofer->ci }}</td>
                            <td>{{ $chofer->sexo }}</td>
                            <td>{{ $chofer->fecha_nac}}</td>


                            <td>

                                <a class="btn btn-primary btn-sm" style="margin-top: 5px"
                                    href="{{ route('choferes.edit', $chofer) }}"><i class="fas fa-pencil-alt"></i>
                                    Editar</a>

                                <form action="{{ route('choferes.destroy', $chofer) }}" method="POST">
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
        $('#choferes').DataTable({
            autoWidth: false
        });
    </script>
@endsection
