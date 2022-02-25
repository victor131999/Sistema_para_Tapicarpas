@extends('adminlte::page')

@section('title', 'TapiCarpas')

@section('content_header')
<h1 align="center">Editar area</h1>
@stop

@section('content')
<form action="{{url('/area/'.$area->id)}}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}
    @include('area.form',['modo'=>'Editar '])

</form>
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
