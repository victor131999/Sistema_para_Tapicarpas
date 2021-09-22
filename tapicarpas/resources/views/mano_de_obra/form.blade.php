@extends('adminlte::page')

@section('title', 'TapiCarpas')

@section('content_header')
    <h1>{{$modo}}Personal de mano de obra</h1>

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
        <input type="text" class="form-control" name="nombre" value="{{isset($mano_de_obra->nombre)?$mano_de_obra->nombre:old('nombre')}}" id="nombre">


        <label for="contacto">Contacto</label>
        <input type="text" class="form-control" name="contacto" value="{{isset($mano_de_obra->contacto)?$mano_de_obra->contacto:old('contacto')}}" id="contacto">


        <label for="">Precio por hora</label>
        <input type="number" step="any" class="form-control" name="precio_hora" value="{{isset($mano_de_obra->precio_hora)?$mano_de_obra->precio_hora:old('precio_hora')}}" id="precio_hora">


        <br/>

        <input class="btn btn-outline-success" type="submit" value="{{$modo}} datos">
        <a href="{{url('mano_de_obra/')}}">Regresar</a>

    </div>

@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop




