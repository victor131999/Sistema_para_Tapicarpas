
@extends('adminlte::page')

@section('title', 'TapiCarpas')

@section('content_header')

@stop

@section('content')
<form action="{{ route("producto_a_fabricar.producto_finalizado.store", [$producto_a_fabricar->id]) }}" method="post" enctype="multipart/form-data">
@csrf
    @include('producto_finalizado.form',['modo'=>'Crear '])
</form>
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
