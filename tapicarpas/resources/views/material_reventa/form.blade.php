@extends('adminlte::page')

@section('title', 'TapiCarpas')

@section('content_header')
    <h1>{{$modo}}Materia prima para reventa</h1>

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

        <label for="nombre_mrev">Nombre</label>
        <input type="text" class="form-control" name="nombre_mrev" value="{{isset($material_reventa->nombre_mrev)?$material_reventa->nombre_mrev:old('nombre_mrev')}}" id="nombre_mrev">


        <label for="descripcion_mrev">Descripción</label>
        <input type="text"class="form-control" name="descripcion_mrev" value="{{isset($material_reventa->descripcion_mrev)?$material_reventa->descripcion_mrev:old('descripcion_mrev')}}" id="descripcion_mrev">

        <label for="precio_mrev">Precio</label>
        <input type="text" class="form-control" name="precio_mrev" value="{{isset($material_reventa->precio_mrev)?$material_reventa->precio_mrev:old('precio_mrev')}}" id="precio_mrev">

        <br/>

        <input class="btn btn-outline-success" type="submit" value="{{$modo}} datos">
        <a href="{{url('material_reventa/')}}">Regresar</a>

    </div>

@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop




