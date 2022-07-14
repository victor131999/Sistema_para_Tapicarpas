
@extends('adminlte::page')

@section('title', 'TapiCarpas')

@section('content_header')
<h1 align="center">Crear factura</h1>
@stop

@section('content')
<form action="{{url('/facturacompra')}}" method="post" enctype="multipart/form-data">
@csrf

    @include('facturacompra.form',['modo'=>'Crear '])

</form>
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>

@stop
