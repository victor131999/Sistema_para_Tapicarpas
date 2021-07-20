
@extends('adminlte::page')

@section('title', 'facturacompra')

@section('content_header')
    <h1>Factura de compra</h1>
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



<a href="{{url('facturacompra/create')}}" class="btn btn-outline-success">Registrar nueva factura de compra</a>
<br/>
<br/>
<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Proveedor</th>
            <th>Responsable</th>
            <th>Vines y servicios con iva</th>
            <th>Bienes con iva</th>
            <th>Servicios con iva</th>
            <th>Descripción</th>
            <th>Total de factura</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>

        @foreach ($facturacompras as $facturacompra)
        <tr>
            <td>{{$facturacompra->id}}</td>
            <td>{{$facturacompra->proveedor->Nombre}}</td>
            <td>{{$facturacompra->responsable->Nombre}} </td>
            <td>{{$facturacompra->bienes_servicios_sinIva_fac}}</td>
            <td>{{$facturacompra->bienes_conIva_fac}}</td>
            <td>{{$facturacompra->servicios_conIva_fac}}</td>
            <td>{{$facturacompra->descripcion_fac}} </td>
            <td>{{$facturacompra->total_fac}}</td>
            <td>
                <a href="{{url('/facturacompra/'.$facturacompra->id.'/edit')}}" class="btn btn-outline-info">
                    Editar
                </a>

                |

                <form action="{{url('/facturacompra/'.$facturacompra->id)}}" class="d-inline" method="post">
                @csrf
                {{method_field('DELETE')}}
                    <input class="btn btn-outline-dark" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                </form>

            </th>
        </tr>
        @endforeach

    </tbody>

</table>
{!!$facturacompras->links()!!}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

