
@extends('adminlte::page')

@section('title', 'herramientas')

@section('content_header')
    <h1>Herramientas</h1>
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



<a href="{{url('herramienta/create')}}" class="btn btn-outline-success">Registrar nuevo herramienta</a>
<br/>
<br/>
<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>

        @foreach ($herramientas as $herramienta)
        <tr>
            <td>{{$herramienta->codA}}.{{$herramienta->codC}}.{{$herramienta->codF}}.{{$herramienta->codI}}</td>
            <td>{{$herramienta->Nombre}}</td>
            <td>{{$herramienta->marca}}</td>
            <td>{{$herramienta->modelo}}</td>
            <td>${{$herramienta->costo}}</td>
            <td>
               <!-- <a href="{{url('/herramienta/'.$herramienta->id.'/edit')}}" class="btn btn-outline-info">
                    Editar
                </a>

                |-->

                <form action="{{url('/herramienta/'.$herramienta->id)}}" class="d-inline" method="post">
                @csrf
                {{method_field('DELETE')}}
                    <input class="btn btn-outline-dark" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                </form>

            </th>
        </tr>
        @endforeach

    </tbody>

</table>
{!!$herramientas->links()!!}
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

