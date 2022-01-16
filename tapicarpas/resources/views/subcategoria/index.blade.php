
@extends('adminlte::page')

@section('title', 'Categorías')

@section('content_header')
    <h1>Subcategorías</h1>
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



<a href="{{url('subcategoria/create')}}" class="btn btn-outline-success">Registrar nuevo Subcategoría</a>
<br/>
<br/>
<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Categoría</th>
            <th>Subcategoría</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>

        @foreach ($subcategorias as $subcategoria)
        <tr>
            <td>{{$subcategoria->id}}</td>
            <td>{{$subcategoria->categoria->nombre}}</td>
            <td>{{$subcategoria->nombre}}</td>
            <td>
                <a href="{{url('/subcategoria/'.$subcategoria->id.'/edit')}}" class="btn btn-outline-info">
                    Editar
                </a>

                |

                <form action="{{url('/subcategoria/'.$subcategoria->id)}}" class="d-inline" method="post">
                @csrf
                {{method_field('DELETE')}}
                    <input class="btn btn-outline-dark" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                </form>

            </th>
        </tr>
        @endforeach

    </tbody>

</table>
{!!$subcategorias->links()!!}
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

