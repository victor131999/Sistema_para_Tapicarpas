@extends('adminlte::page')

@section('title', 'TapiCarpas')

@section('content_header')
<h1 align="center">Registrar materia</h1>
@stop

@section('content')
<form action="{{url('/materia_prima')}}" method="post" enctype="multipart/form-data">
@csrf

    @include('materia_prima.form',['modo'=>'Crear '])

</form>
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
