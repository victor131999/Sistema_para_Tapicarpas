
@extends('adminlte::page')

@section('title', 'Responsables')

@section('content_header')
    <h1>Responsables</h1>
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



<a href="{{url('responsable/create')}}" class="btn btn-outline-success">Registrar nuevo responsable</a>
<br/>
<br/>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#/{{$Numdatos = DB::table('responsables')->count()}}</th>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>

        @foreach ($responsables as $responsable)
        <tr>
            <td>{{$loop->iteration}}</td>

            <td>{{$responsable->Nombre}}</td>
            <td>{{$responsable->Direccion}}</td>
            <td>{{$responsable->Telefono}}</td>
            <td>
                <a href="{{url('/responsable/'.$responsable->id.'/edit')}}" class="btn btn-outline-info">
                    Editar
                </a>

                |

                <form action="{{url('/responsable/'.$responsable->id)}}" class="d-inline" method="post">
                @csrf
                {{method_field('DELETE')}}
                    <input class="btn btn-outline-dark" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                </form>

            </th>
        </tr>
        @endforeach

    </tbody>

</table>
{!!$responsables->links()!!}
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

