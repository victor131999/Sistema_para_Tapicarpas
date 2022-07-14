
@extends('adminlte::page')

@section('title', 'TapiCarpas')

@section('content_header')

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

@stop
