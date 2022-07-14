
@extends('adminlte::page')

@section('title', 'Categorías')

@section('content_header')
    <h1>Categorías</h1>
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



<a href="{{url('categoria/create')}}" class="btn btn-outline-success">Registrar nuevo categoría</a>
<br/>
<br/>
<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>#/{{$Numdatos = DB::table('categorias')->count()}}</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>

        @foreach ($categorias as $categoria)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$categoria->nombre}}</td>
            <td>
                <a href="{{url('/categoria/'.$categoria->id.'/edit')}}" class="btn btn-outline-info">
                    Editar
                </a>

                |

                <form action="{{url('/categoria/'.$categoria->id)}}" class="d-inline" method="post">
                @csrf
                {{method_field('DELETE')}}
                    <input class="btn btn-outline-dark" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                </form>

            </th>
        </tr>
        @endforeach

    </tbody>

</table>
{!!$categorias->links()!!}
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

