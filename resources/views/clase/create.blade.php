@extends('adminlte::page')

@section('title', 'TapiCarpas')

@section('content_header')
    <h1 align="center">Crear clase</h1>
@stop

@section('content')
<form action="{{url('/clase')}}" method="post" enctype="multipart/form-data">
@csrf

    @include('clase.form',['modo'=>'Crear '])

</form>
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

