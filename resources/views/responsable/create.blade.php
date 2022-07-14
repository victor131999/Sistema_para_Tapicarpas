@extends('adminlte::page')

@section('title', 'TapiCarpas')

@section('content_header')
<h1 align="center">Registrar responsable</h1>
@stop

@section('content')
<form action="{{url('/responsable')}}" method="post" enctype="multipart/form-data">
@csrf

    @include('responsable.form',['modo'=>'Crear '])

</form>
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

