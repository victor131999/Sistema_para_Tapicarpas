@extends('adminlte::page')

@section('title', 'TapiCarpas')

@section('content_header')
<h1 align="center">Crear una familia</h1>
@stop

@section('content')
<form action="{{url('/familia')}}" method="post" enctype="multipart/form-data">
@csrf

    @include('familia.form',['modo'=>'Crear '])

</form>
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
