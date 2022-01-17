@extends('adminlte::page')

@section('title', 'TapiCarpas')

@section('content_header')
<h1 align="center">Registrar proveedor</h1>
@stop

@section('content')
<form action="{{url('/proveedor')}}" method="post" enctype="multipart/form-data">
@csrf

    @include('proveedor.form',['modo'=>'Crear '])

</form>
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
