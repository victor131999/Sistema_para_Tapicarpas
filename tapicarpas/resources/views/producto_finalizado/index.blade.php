
@extends('adminlte::page')

@section('title', 'producto_finalizados')

@section('content_header')
    <h1>Productos</h1>
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
                    Guardado con exito
                </div>
            @else
                <div class = "alert alert-success">
                    {{session('status')}}
                </div>
            @endif
        @endif
<p>Buscar : </p>
  <input class="form-control" id="search" type="text" placeholder="Search..">
  <br>
<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th># de Orden</th>
            <th>Responsable</th>
            <th>Cliente</th>
            <th>Estado</th>
            <th>Total</th>
            <th>Acciones</th>

        </tr>
    </thead>

    <tbody id="myTable">

        @foreach ($producto_finalizados as $producto_finalizado)
        <tr>
            <td>{{$producto_finalizado->id}}</td>
            <td>{{$producto_finalizado->id}}</td>
            <td>{{$producto_finalizado->id}}</td>
            <td>{{$producto_finalizado->id}}</td>
            <td>{{$producto_finalizado->id}}</td>
            <td>{{$producto_finalizado->c_total}}</td>
            <td>
            <a href="{{url('/producto_finalizado/'.$producto_finalizado->id)}}" class="btn btn-outline-info">Ver</a>
            |
           {{-- <a href="{{url('/producto_finalizado/'.$producto_finalizado->id.'/edit')}}" class="btn btn-outline-info">Editar </a>
            |
            <form action="{{url('/producto_finalizado/'.$producto_finalizado->id)}}" class="d-inline" method="post">
            @csrf
            {{method_field('DELETE')}}
                <input class="btn btn-outline-dark" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
            </form>--}}

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
    <script> $(document).ready(function(){
        $("#search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        }); 
    </script>
@stop

