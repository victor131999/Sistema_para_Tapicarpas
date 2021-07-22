
@extends('adminlte::page')

@section('title', 'Tipos de materia prima')

@section('content_header')
    <h1>Tipos de materia prima</h1>
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



<a href="{{url('tipo_materia_primas/create')}}" class="btn btn-outline-success">Registrar nuevo tipo de materia</a>
<br/>
<br/>
<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>

        @foreach ($tipo_materia_primass as $tipo_materia_primas)
        <tr>
            <td>{{$tipo_materia_primas->id}}</td>

            <td>{{$tipo_materia_primas->nombre_tipo}}</td>
            <td>{{$tipo_materia_primas->descripcion_tipo}}</td>
            <td>
                <a href="{{url('/tipo_materia_primas/'.$tipo_materia_primas->id.'/edit')}}" class="btn btn-outline-info">
                    Editar
                </a>

                |

                <form action="{{url('/tipo_materia_primas/'.$tipo_materia_primas->id)}}" class="d-inline" method="post">
                @csrf
                {{method_field('DELETE')}}
                    <input class="btn btn-outline-dark" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                </form>

            </th>
        </tr>
        @endforeach

    </tbody>

</table>
{!!$tipo_materia_primass->links()!!}
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

