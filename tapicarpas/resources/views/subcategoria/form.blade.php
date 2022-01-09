@extends('adminlte::page')

@section('title', 'TapiCarpas')

@section('content_header')
    <h1>{{$modo}}Subcategoría</h1>

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
        <div class="col-md-1 col-lg-4">
        <div class="form-group">
        <label for="id_categoria">Categorías</label>
                <select class="form-control" type="text" name="id_categoria" value="{{isset($categoria->id_categoria)?$categoria->id_categoria:old('id_categoria')}}" id="id_categoria">
                    @foreach ($categoria as $categorias)
                            <option value="{{$categorias->id}}">
                                {{$categorias->id}} - {{$categorias->nombre}}
                            </option>
                    @endforeach

            </select>
        </div>
        </div>
        <label for="nombre">Subcategoría</label>
        <input type="text" class="form-control" name="nombre" value="{{isset($subcategoria->nombre)?$subcategoria->nombre:old('nombre')}}" id="nombre">
        <br/>

        <input class="btn btn-outline-success" type="submit" value="{{$modo}} datos">
        <a href="{{url('categoria/')}}">Regresar</a>

    </div>

@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop




