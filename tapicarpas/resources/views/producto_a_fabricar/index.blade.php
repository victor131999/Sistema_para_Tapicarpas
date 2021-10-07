
@extends('adminlte::page')

@section('title', 'producto_a_fabricars')

@section('content_header')
    <h1>Producto a fabricar</h1>
@stop

@section('content')


@if(Session::has('mensaje'))
<div class="alert alert-success alert-dismissible" role="alert">
    {{Session::get('mensaje')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if(session('status'))
            @if(session('status')=='1')
                <div class = "alert alert-success">
                    La factura fue guardada con exito
                </div>
            @else
                <div class = "alert alert-success">
                    {{session('status')}}
                </div>
            @endif
        @endif


<a href="{{url('producto_a_fabricar/create')}}" class="btn btn-outline-success">Registrar nuevo producto a fabricar</a>
<br/>
<br/>

<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Color</th>
            <th>Medida</th>
            <th>Subcategoría</th>
            <th>Fecha de inicio</th>
            <th>Fecha de fin</th>
            <th>Acciones</th>
            
        </tr>
    </thead>

    <tbody>

        @foreach ($producto_a_fabricars as $producto_a_fabricar)
        <tr>
            <td>{{$producto_a_fabricar->id}}</td>
            <td>{{$producto_a_fabricar->nombre}}</td>
            
            <td>{{$producto_a_fabricar->color}}</td>
            <td>{{$producto_a_fabricar->medida}}</td>
            <td>{{$producto_a_fabricar->sub_categorias->nombre ?? '' }}  </td>
            <td>{{$producto_a_fabricar->fecha_inicio}}</td>
            <td>{{$producto_a_fabricar->fecha_fin}}</td>
            <td>
            <a href="{{url('/producto_a_fabricar/'.$producto_a_fabricar->id)}}" class="btn btn-outline-info">Ver</a>
            |
            <a href="{{url('/producto_a_fabricar/'.$producto_a_fabricar->id.'/edit')}}" class="btn btn-outline-info">Editar </a>
            |
            <form action="{{url('/producto_a_fabricar/'.$producto_a_fabricar->id)}}" class="d-inline" method="post">
            @csrf
            {{method_field('DELETE')}}
                <input class="btn btn-outline-dark" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
            </form>

            </th>
        </tr>
        @endforeach

    </tbody>

</table>
{!!$producto_a_fabricars->links()!!}
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

