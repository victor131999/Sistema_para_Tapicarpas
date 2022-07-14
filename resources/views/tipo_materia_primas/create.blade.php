@extends('adminlte::page')

@section('title', 'TapiCarpas')

@section('content_header')
<h1 align="center">Crear unidad de medida</h1>
@stop

@section('content')

<form action="{{url('/tipo_materia_primas')}}" method="post" enctype="multipart/form-data">
@csrf

    @include('tipo_materia_primas.form',['modo'=>'Crear '])

</form>
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
