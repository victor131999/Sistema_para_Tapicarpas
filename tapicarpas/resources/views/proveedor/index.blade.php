
@extends('adminlte::page')

@section('title', 'Proveedores')

@section('content_header')
    <h1>Proveedores</h1>
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



<a href="{{url('proveedor/create')}}" class="btn btn-outline-success">Registrar nuevo proveedor</a>
<br/>
<br/>
<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>

        @foreach ($proveedors as $proveedor)
        <tr>
            <td>{{$proveedor->id}}</td>

            <td>{{$proveedor->Nombre}}</td>
            <td>{{$proveedor->Direccion}}</td>
            <td>{{$proveedor->Telefono}}</td>
            <td>
                <a href="{{url('/proveedor/'.$proveedor->id.'/edit')}}" class="btn btn-outline-info">
                    Editar
                </a>

                |

                <form action="{{url('/proveedor/'.$proveedor->id)}}" class="d-inline" method="post">
                @csrf
                {{method_field('DELETE')}}
                    <input class="btn btn-outline-dark" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                </form>

            </th>
        </tr>
        @endforeach

    </tbody>

</table>
{!!$proveedors->links()!!}
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

