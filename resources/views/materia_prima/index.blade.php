
@extends('adminlte::page')

@section('title', 'Materia prima')

@section('content_header')
    <h1>Materia prima</h1>
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



<a href="{{url('materia_prima/create')}}" class="btn btn-outline-success">Registrar nueva materia prima</a>
<br/>
<br/>

<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>#/{{$Numdatos = DB::table('materia_primas')->count()}}</th>
            <th>Nombre</th>
            <th>Color</th>
            <th>Stock</th>
            <th>Unidad</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>

        @foreach ($materia_primas as $materia_prima)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$materia_prima->nombre_mp}}</td>
            <td>{{$materia_prima->color_mp}}</td>
            <td>{{$materia_prima->cantidad_mp}}</td>
            <td>{{$materia_prima->tipos->nombre_tipo}} </td>
            <td>
                <a href="{{url('/materia_prima/'.$materia_prima->id.'/')}}" class="btn btn-outline-info">
                    Ver
                </a>

                |
                <a href="{{url('/materia_prima/'.$materia_prima->id.'/edit')}}" class="btn btn-outline-info">
                     Editar
                </a>
                |
                <form action="{{url('/materia_prima/'.$materia_prima->id)}}" class="d-inline" method="post">
                @csrf
                {{method_field('DELETE')}}
                    <input class="btn btn-outline-dark" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                </form>

            </th>
        </tr>
        @endforeach

    </tbody>

</table>
{!!$materia_primas->links()!!}
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

