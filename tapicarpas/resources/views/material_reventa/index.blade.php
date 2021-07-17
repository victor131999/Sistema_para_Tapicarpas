
@extends('adminlte::page')

@section('title', 'material_reventas')

@section('content_header')
    <h1>Materia prima para reventa</h1>
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



<a href="{{url('material_reventa/create')}}" class="btn btn-outline-success">Registrar nueva materia prima</a>
<br/>
<br/>
<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>

        @foreach ($material_reventas as $material_reventa)
        <tr>
            <td>{{$material_reventa->id}}</td>
            <td>{{$material_reventa->nombre_mrev}}</td>
            <td>{{$material_reventa->descripcion_mrev}}</td>
            <td>{{$material_reventa->precio_mrev}}</td>

            <td>
                <a href="{{url('/material_reventa/'.$material_reventa->id.'/edit')}}" class="btn btn-outline-info">
                    Editar
                </a>

                |

                <form action="{{url('/material_reventa/'.$material_reventa->id)}}" class="d-inline" method="post">
                @csrf
                {{method_field('DELETE')}}
                    <input class="btn btn-outline-dark" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                </form>

            </th>
        </tr>
        @endforeach

    </tbody>

</table>
{!!$material_reventas->links()!!}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

