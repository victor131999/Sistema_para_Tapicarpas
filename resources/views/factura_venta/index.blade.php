
@extends('adminlte::page')
@section('title', 'factura_venta')
@section('content_header')
    <h1>Facturas de venta</h1>
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
<a href="{{url('factura_venta/create')}}" class="btn btn-outline-success">Vender producto</a>
<br/><br/>
<p>Buscar : </p>
<input class="form-control" id="search" type="text" placeholder="Search..">
<br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#/{{$Numdatos = DB::table('facturas_ventas')->count()}}</th>
            <th>Cliente</th>
            <th>Total</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody id="myTable">
        @foreach ($factura_ventas as $factura)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$factura->cliente->nombre ?? ''}}</br><p class="text-muted">{{$factura->cliente->cedula ?? ''}}</p></td>
            <td>{{$factura->total_fv ?? ''}}</td>
            <td><a href="{{url('/factura_venta/'.$factura->id)}}" class="btn btn-outline-info">Ver</a>
            </th>
        </tr>
        @endforeach
    </tbody>
</table>
{!!$factura_ventas->links()!!}
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

