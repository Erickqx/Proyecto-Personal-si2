@extends('adminlte::page')

 @section('title', 'Clina Montalvo')


@section('content_header')
    <h1>Menu de Inicio</h1>
   
@stop

@section('content')
    <p>Bienvenido al panel de Administrador.</p>

    <div style="width: 6rem; display: flexbox; justify-content: center;" >
        <img style="margin-left: 10rem" width="800rem" src="https://docplayer.es/docs-images/87/96206789/images/70-0.jpg" alt="">
    </div>


@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stop

@section('js')
    <script src="asset('js/app.js')"></script>
@stop