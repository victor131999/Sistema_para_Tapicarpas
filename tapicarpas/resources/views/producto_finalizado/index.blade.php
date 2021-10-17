
@extends('adminlte::page')

@section('title', 'producto_finalizados')

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


<a href="{{url('producto_finalizado/create')}}" class="btn btn-outline-success">Registrar nuevo producto</a>
<br/>
<br/>

<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Agua</th>
            <th>Luz</th>
            <th>Varios</th>
            <th>Administrador</th>
            <th>Imprevistos</th>
            <th>Total</th>
            <th>Acciones</th>

        </tr>
    </thead>

    <tbody>

        @foreach ($producto_finalizados as $producto_finalizado)
        <tr>
            <td>{{$producto_finalizado->id}}</td>
            <td>{{$producto_finalizado->c_agua}}</td>

            <td>{{$producto_finalizado->c_luz}}</td>
            <td>{{$producto_finalizado->c_varios}}</td>
            <td>{{$producto_finalizado->c_admin}}  </td>
            <td>{{$producto_finalizado->c_imprevistos}}</td>
            <td>{{$producto_finalizado->c_total}}</td>
            <td>
            <a href="{{url('/producto_finalizado/'.$producto_finalizado->id)}}" class="btn btn-outline-info">Ver</a>
            |
            <a href="{{url('/producto_finalizado/'.$producto_finalizado->id.'/edit')}}" class="btn btn-outline-info">Editar </a>
            |
            <form action="{{url('/producto_finalizado/'.$producto_finalizado->id)}}" class="d-inline" method="post">
            @csrf
            {{method_field('DELETE')}}
                <input class="btn btn-outline-dark" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
            </form>

            </th>
        </tr>
        @endforeach

    </tbody>

</table>
{!!$producto_finalizados->links()!!}
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

