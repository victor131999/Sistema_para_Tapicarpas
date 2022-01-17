@extends('adminlte::page')

@section('title', 'TapiCarpas')

@section('content_header')

@stop

@section('content')
<form action="{{url('/materia_prima/'.$materia_prima->id)}}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}
    @include('materia_prima.form',['modo'=>'Editar ']);

</form>
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
