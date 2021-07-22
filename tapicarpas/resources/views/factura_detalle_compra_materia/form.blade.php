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
        <input type="text" class="form-control" name="nombre_mp" value="{{isset($factura_detalle_compra_materia->nombre_mp)?$factura_detalle_compra_materia->nombre_mp:old('nombre_mp')}}" id="nombre_mp">


        <label for="color_mp">Color</label>
        <input type="text" class="form-control" name="color_mp" value="{{isset($factura_detalle_compra_materia->color_mp)?$factura_detalle_compra_materia->color_mp:old('color_mp')}}" id="color_mp">


        <label for="ancho_mp">Ancho</label>
        <input type="text"class="form-control" name="ancho_mp" value="{{isset($factura_detalle_compra_materia->ancho_mp)?$factura_detalle_compra_materia->ancho_mp:old('ancho_mp')}}" id="ancho_mp">

        <label for="largo_mp">Largo</label>
        <input type="text" class="form-control" name="largo_mp" value="{{isset($factura_detalle_compra_materia->largo_mp)?$factura_detalle_compra_materia->largo_mp:old('largo_mp')}}" id="largo_mp">


        <label for="id_tipo">Tipo</label>
        <select  class="form-control" type="text" name="id_tipo" value="{{isset($factura_detalle_compra_materia->id_tipo)?$factura_detalle_compra_materia->id_tipo:old('id_tipo')}}" id="id_tipo">
            @foreach ($tipo_factura_detalle_compra_materias as $tipo_factura_detalle_compra_materiass)
                    <option value="{{$tipo_factura_detalle_compra_materiass->id}} ">
                        {{$tipo_factura_detalle_compra_materiass->id}} - {{$tipo_factura_detalle_compra_materiass->nombre_tipo}}
                    </option>
            @endforeach

       </select>


        <br/>

        <input class="btn btn-outline-success" type="submit" value="{{$modo}} datos">
        <a href="{{url('factura_detalle_compra_materia/')}}">Regresar</a>

    </div>

@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop




