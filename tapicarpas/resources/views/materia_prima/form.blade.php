@extends('adminlte::page')

@section('title', 'TapiCarpas')

@section('content_header')
    <h1>{{$modo}}Materia prima</h1>

@stop

@section('content')

    <div class="form-gourp">

        @if(count($errors)>0)
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>

            </div>
        @endif

        <label for="nombre_mp">Nombre</label>
        <input type="text" class="form-control" name="nombre_mp" value="{{isset($materia_prima->nombre_mp)?$materia_prima->nombre_mp:old('nombre_mp')}}" id="nombre_mp">


        <label for="color_mp">Color</label>
        <input type="text" class="form-control" name="color_mp" value="{{isset($materia_prima->color_mp)?$materia_prima->color_mp:old('color_mp')}}" id="color_mp">


        <label for="ancho_mp">Ancho</label>
        <input type="text"class="form-control" name="ancho_mp" value="{{isset($materia_prima->ancho_mp)?$materia_prima->ancho_mp:old('ancho_mp')}}" id="ancho_mp">

        <label for="largo_mp">Largo</label>
        <input type="text" class="form-control" name="largo_mp" value="{{isset($materia_prima->largo_mp)?$materia_prima->largo_mp:old('largo_mp')}}" id="largo_mp">


        <label for="otros_mp">Otro</label>
        <input type="text"class="form-control" name="otros_mp" value="{{isset($materia_prima->otros_mp)?$materia_prima->otros_mp:old('otros_mp')}}" id="otros_mp">

        <label for="id_tipo">Tipo</label>
        <input type="text"class="form-control" name="id_tipo" value="{{isset($materia_prima->id_tipo)?$materia_prima->id_tipo:old('id_tipo')}}" id="id_tipo">

        <br/>

        <input class="btn btn-outline-success" type="submit" value="{{$modo}} datos">
        <a href="{{url('materia_prima/')}}">Regresar</a>

    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop




