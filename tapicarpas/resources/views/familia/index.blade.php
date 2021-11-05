
@extends('adminlte::page')

@section('title', 'Categorías')

@section('content_header')
    <h1>Familias</h1>
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



<a href="{{url('familia/create')}}" class="btn btn-outline-success">Registrar nuevo familia</a>
<br/>
<br/>
<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Código</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>

        @foreach ($familias as $familia)
        <tr>
            <td>{{$familia->id}}</td>
            <td>{{$familia->nombre}}</td>
            <td>{{$familia->cod}}</td>
            <td>
                <a href="{{url('/familia/'.$familia->id.'/edit')}}" class="btn btn-outline-info">
                    Editar
                </a>

                |

                <form action="{{url('/familia/'.$familia->id)}}" class="d-inline" method="post">
                @csrf
                {{method_field('DELETE')}}
                    <input class="btn btn-outline-dark" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                </form>

            </th>
        </tr>
        @endforeach

    </tbody>

</table>
{!!$familias->links()!!}
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

