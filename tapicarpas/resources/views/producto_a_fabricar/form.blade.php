@extends('adminlte::page')

@section('title', 'TapiCarpas')

@section('content_header')
    <h1>{{$modo}}Producto a fabricar</h1>

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
        <input type="text" class="form-control" name="nombre" value="{{isset($categoria->nombre)?$categoria->nombre:old('nombre')}}" id="nombre">

        <label for="id_categoria">Categorías</label>
        <select class="form-control" type="text" name="id_categoria" value="{{isset($categoria->id_categoria)?$categoria->id_categoria:old('id_categoria')}}" id="id_categoria">
            @foreach ($categoria as $categorias)
                    <option value="{{$categorias->id}}">
                        {{$categorias->id}} - {{$categorias->nombre}}
                    </option>
            @endforeach

       </select>

       <label for="id_responsable">Responsable</label>
       <select class="form-control" type="text" name="id_responsable" value="{{isset($categoria->id_responsable)?$categoria->id_responsable:old('id_responsable')}}" id="id_responsable">
           @foreach ($responsable as $responsables)
                   <option value="{{$responsables->id}}">
                       {{$responsables->id}} - {{$responsables->Nombre}}
                   </option>
           @endforeach

      </select>
        <label for="fecha_inicio">Fecha de inicio</label>
        <input type="text" class="form-control" name="fecha_inicio" value="{{isset($categoria->fecha_inicio)?$categoria->fecha_inicio:old('fecha_inicio')}}" id="fecha_inicio">

        <label for="fecha_fin">Fecha de Finalización</label>
        <input type="text" class="form-control" name="fecha_fin" value="{{isset($categoria->fecha_fin)?$categoria->fecha_fin:old('fecha_fin')}}" id="fecha_fin">

        <label for="color">Color</label>
        <input type="text" class="form-control" name="color" value="{{isset($categoria->color)?$categoria->color:old('color')}}" id="color">

        <label for="medida">Medida</label>
        <input type="text" class="form-control" name="medida" value="{{isset($categoria->medida)?$categoria->medida:old('medida')}}" id="medida">

        <label for="material">Material</label>
        <input type="text" class="form-control" name="material" value="{{isset($categoria->material)?$categoria->material:old('material')}}" id="material">



        <br/>

        <input class="btn btn-outline-success" type="submit" value="{{$modo}} datos">
        <a href="{{url('producto_a_fabricar/')}}">Regresar</a>

    </div>

@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop




