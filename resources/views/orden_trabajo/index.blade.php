
@extends('adminlte::page')

@section('title', 'orden_trabajos')

@section('content_header')
    <h1>Orden de trabajo</h1>
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
                    La orden de trabajo fue agregada con éxito
                </div>
            @else
                <div class = "alert alert-success">
                    {{session('status')}}
                </div>
            @endif
        @endif


<a href="{{url('orden_trabajo/create')}}" class="btn btn-outline-success">Registrar nueva orden de trabajo</a>
<br/>
<br/>

<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>#/{{$Numdatos = DB::table('orden_trabajos')->count()}}</th>
            <th>Cliente</th>
            <th>Producto</th>
            <th>Color</th>
            <th>Medida</th>
            <th>Subcategoría</th>
            <th>Acciones</th>

        </tr>
    </thead>

    <tbody>

        @foreach ($orden_trabajos as $orden_trabajo)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$orden_trabajo->clientes->nombre}}</td>
            <td>{{$orden_trabajo->nombre}}</td>
            <td>{{$orden_trabajo->color}}</td>
            <td>{{$orden_trabajo->medida}}</td>
            <td>{{$orden_trabajo->sub_categorias->nombre ?? '' }}  </td>
            <td>
            <a href="{{url('/orden_trabajo/'.$orden_trabajo->id)}}" class="btn btn-outline-info">Ver</a>
           <!-- |
            <a href="{{url('/orden_trabajo/'.$orden_trabajo->id.'/edit')}}" class="btn btn-outline-info">Editar </a> -->
            |
            <form action="{{url('/orden_trabajo/'.$orden_trabajo->id)}}" class="d-inline" method="post">
            @csrf
            {{method_field('DELETE')}}
                <input class="btn btn-outline-dark" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
            </form>
            <!--|
            <a class="btn btn-outline-danger" href="{{ url('/producto_finalizado/create') }}">Finalizar orden</a> -->
            </th>
        </tr>
        @endforeach

    </tbody>

</table>
{!!$orden_trabajos->links()!!}
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

