@extends('adminlte::page')

@section('title', 'TapiCarpas')

@section('content_header')

@stop

@section('content')
<form action="{{url('/factura_venta')}}" method="post" enctype="multipart/form-data">
@csrf

    @include('factura_venta.form',['modo'=>'Crear '])

</form>
@stop

@section('css')

@stop

@section('js')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
@stop

