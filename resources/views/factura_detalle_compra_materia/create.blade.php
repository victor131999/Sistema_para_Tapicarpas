@extends('adminlte::page')

@section('title', 'TapiCarpas')

@section('content_header')
<h1 align="center">Crear</h1>
@stop

@section('content')
<form action="{{url('/factura_detalle_compra_materia')}}" method="post" enctype="multipart/form-data">
@csrf

    @include('factura_detalle_compra_materia.form',['modo'=>'Crear '])

</form>

@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

