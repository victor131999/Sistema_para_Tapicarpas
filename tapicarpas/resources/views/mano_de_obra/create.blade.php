@extends('adminlte::page')

@section('title', 'TapiCarpas')

@section('content_header')
<h1 align="center">Registrar persona</h1>
@stop

@section('content')
<form action="{{url('/mano_de_obra')}}" method="post" enctype="multipart/form-data">
@csrf

    @include('mano_de_obra.form',['modo'=>'Crear '])

</form>
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
