
@extends('adminlte::page')

@section('title', 'TapiCarpas')

@section('content_header')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
         <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
@stop

@section('content')
<form action="{{url('/orden_trabajo')}}" method="post" enctype="multipart/form-data">
@csrf

    @include('orden_trabajo.form',['modo'=>'Crear '])

</form>

@stop

@section('css')

@stop

@section('js')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script> $('.form-control').selectpicker();</script>
@stop
