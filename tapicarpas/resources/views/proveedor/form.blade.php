@extends('adminlte::page')

@section('title', 'TapiCarpas')

@section('content_header')
    <h1>{{$modo}}proveedor</h1>

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

        <label for="Nombre">Nombre</label>
        <input type="text" class="form-control" name="Nombre" value="{{isset($proveedor->Nombre)?$proveedor->Nombre:old('Nombre')}}" id="Nombre">


        <label for="Direccion">Dirección</label>
        <input type="text" class="form-control" name="Direccion" value="{{isset($proveedor->Direccion)?$proveedor->Direccion:old('Direccion')}}" id="Direccion">


        <label for="Telefono">Telefono</label>
        <input type="text"class="form-control" name="Telefono" value="{{isset($proveedor->Telefono)?$proveedor->Telefono:old('Telefono')}}" id="Telefono">

        <label for="Producto">Producto</label>
        <input type="text"class="form-control" name="Producto" value="{{isset($proveedor->Producto)?$proveedor->Producto:old('Producto')}}" id="Producto">

        <br/>

        <input class="btn btn-outline-success" type="submit" value="{{$modo}} datos">
        <a href="{{url('proveedor/')}}">Regresar</a>

    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop



