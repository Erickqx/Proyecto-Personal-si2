@extends('adminlte::page')

 @section('title', 'Clina Montalvo')


@section('content_header')
    <h1>Menu de Inicio</h1>
   
@stop

@section('content')
    <p>Bienvenido al panel de Administrador.</p>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stop

@section('js')
    <script src="asset('js/app.js')"></script>
@stop