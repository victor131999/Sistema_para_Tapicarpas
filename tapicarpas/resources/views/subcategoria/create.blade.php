@extends('adminlte::page')

@section('title', 'TapiCarpas')

@section('content_header')

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

