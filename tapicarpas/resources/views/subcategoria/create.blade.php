@extends('adminlte::page')

@section('title', 'TapiCarpas')

@section('content_header')
<h1 align="center">Crear subcategoría</h1>
@stop

@section('content')

<form action="{{url('/subcategoria')}}" method="post" enctype="multipart/form-data">
@csrf

    @include('subcategoria.form',['modo'=>'Crear '])

</form>
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

