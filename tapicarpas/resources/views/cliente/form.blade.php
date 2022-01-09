@extends('adminlte::page')

@section('title', 'TapiCarpas')

@section('content_header')
    <h1>{{$modo}}cliente</h1>

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

        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" name="nombre" value="{{isset($cliente->nombre)?$cliente->nombre:old('nombre')}}" id="nombre">
        <label for="cedula">Cédula</label>
        <input type="number" class="form-control"  name="cedula" value="{{isset($cliente->cedula)?$cliente->cedula:old('cedula')}}" id="cedula">
        <label for="direccion">Dirección</label>
        <input type="text" class="form-control" name="direccion" value="{{isset($cliente->direccion)?$cliente->direccion:old('direccion')}}" id="direccion">
        <label for="telefono">Teléfono</label>
        <input type="number"class="form-control"  name="telefono" value="{{isset($cliente->telefono)?$cliente->telefono:old('telefono')}}" id="telefono">
        <label for="correo">Correo electrónico</label>
        <input type="text"class="form-control" name="correo" value="{{isset($cliente->correo)?$cliente->correo:old('correo')}}" id="correo">
        <br/>

        <input class="btn btn-outline-success" type="submit" value="{{$modo}} datos">
        <a href="{{url('cliente/')}}">Regresar</a>

    </div>

@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop




