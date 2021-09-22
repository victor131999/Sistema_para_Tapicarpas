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


        <label for="id_tipo">Unidad de medida</label>
        <select onclick="Habilitar()" class="form-control" type="text" name="id_tipo" value="{{isset($materia_prima->id_tipo)?$materia_prima->id_tipo:old('id_tipo')}}" id="id_tipo">
            @foreach ($tipo_materia_primas as $tipo_materia_primass)
                    <option value="{{$tipo_materia_primass->id}}">
                        {{$tipo_materia_primass->id}} - {{$tipo_materia_primass->nombre_tipo}}
                    </option>
            @endforeach

       </select>

       <label for="">Stock</label>
       <input type="number" class="form-control" name="cantidad_mp" value="{{isset($materia_prima->cantidad_mp)?$materia_prima->cantidad_mp:old('cantidad_mp')}}" id="cantidad_mp">

       <label for="">Precio por unidad</label>
       <input type="number" step="any" class="form-control" name="costo_unidad_mp" value="{{isset($materia_prima->costo_unidad_mp)?$materia_prima->costo_unidad_mp:old('costo_unidad_mp')}}" id="costo_unidad_mp">


   </select>
        <script type="text/javascript">
        function Habilitar(){
            var seleccion=document.getElementById("id_tipo");
            var ancho=document.getElementById("ancho_mp");
            var largo=document.getElementById("largo_mp")
            if(seleccion.value != 1){
                ancho.disabled=true;
                largo.disabled=true;
            }else{
                ancho.disabled=false;
                largo.disabled=false;
            }
        }
        </script>

       <label for="ancho_mp">Ancho</label>
       <input  onkeyup="Habilitar()" type="number" step="any" class="form-control" name="ancho_mp" value="{{isset($materia_prima->ancho_mp)?$materia_prima->ancho_mp:old('ancho_mp')}}" id="ancho_mp">

       <label for="largo_mp">Largo</label>
       <input onkeyup="Habilitar()" type="number" step="any" class="form-control" name="largo_mp" value="{{isset($materia_prima->largo_mp)?$materia_prima->largo_mp:old('largo_mp')}}" id="largo_mp">

        <br/>

        <input class="btn btn-outline-success" type="submit" value="{{$modo}} datos">
        <a href="{{url('materia_prima/')}}">Regresar</a>

    </div>

@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop




