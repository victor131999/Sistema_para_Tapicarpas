
@extends('adminlte::page')

@section('title', 'Mano de obra')

@section('content_header')
    <h1>Personal de mano de obra</h1>
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



<a href="{{url('mano_de_obra/create')}}" class="btn btn-outline-success">Registrar nueva persona</a>
<br/>
<br/>
<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Contacto</th>
            <th>Precio por hora</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>

        @foreach ($mano_de_obras as $mano_de_obra)
        <tr>
            <td>{{$mano_de_obra->id}}</td>
            <td>{{$mano_de_obra->nombre}}</td>
            <td>{{$mano_de_obra->contacto}}</td>
            <td>{{$mano_de_obra->precio_hora}}</td>
            <td>
                <a href="{{url('/mano_de_obra/'.$mano_de_obra->id.'/edit')}}" class="btn btn-outline-info">
                    Editar
                </a>

                |

                <form action="{{url('/mano_de_obra/'.$mano_de_obra->id)}}" class="d-inline" method="post">
                @csrf
                {{method_field('DELETE')}}
                    <input class="btn btn-outline-dark" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                </form>

            </th>
        </tr>
        @endforeach

    </tbody>

</table>
{!!$mano_de_obras->links()!!}
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

