@extends('adminlte::page')

@section('title', 'TapiCarpas')

@section('content_header')
    <h1>Factura de compra </h1>

@stop

@section('content')
<div class="container">
            <div class="row">
                <div class="col-6">
                     <p><b>Proveedor : </b> {{$facturas[0]->po}}</p>
                </div>
                <div class="col-6">
                    <p> <b>Responsable: </b> {{$facturas[0]->responsables}}</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-4">
                <p for="bienes_servicios_sinIva_fac"><b>Bienes o servicios sin iva :</b>   ${{$facturas[0]->bienes_servicios_sinIva_fac}} </p>
                </div>
                <div class="col-4">
                <p for="bienes_conIva_fac"><b>Bienes o servicios con iva:</b>   ${{$facturas[0]->bienes_conIva_fac}}</p>
                </div>
                <div class="col-4">
                <p for="servicios_conIva_fac"><b>Servicios con iva:</b>    ${{$facturas[0]->servicios_conIva_fac}}</p>
                </div>
            </div>
            <p><b>Descripcion:</b>   {{$facturas[0]->descripcion_fac}} </p>

        </div>
@if(count($detalles)>0)
<div class ="row">
    <div class="col">
        <table class="table">
            <thead>
                <tr>
                    <th colspan = "4" class = "text-center">Detalles</th>
                </tr>
                <tr>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Sub total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($detalles as $valor)
                <tr>
                    <td>{{$valor->mp}}</td>
                    <td>{{$valor->cantidad_df}}</td>
                    <td>${{$valor->costoU_df}}</td>
                    <td>${{$valor->subtotal_df}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
<div class="d-flex flex-row-reverse bg-dark text-white p-4">
    <div class="py-3 px-5 text-right">
        <div class="mb-2">Generar PDF</div>
        <div class="h2 font-weight-light"><button class="btn btn-primary">PDF</button></div>
    </div>

    <div class="py-3 px-5 text-right">
        <div class="mb-2"></div>
        <div class="h2 font-weight-light"></div>
    </div>

    <div class="py-3 px-5 text-right">
        <div class="mb-2">Total a pagar</div>
        <div class="h2 font-weight-light" id ='total'>${{$facturas[0]->total_fac}}</div>
    </div>
</div>
<a href="{{url('facturacompra/')}}">Regresar</a>
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

