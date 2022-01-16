@extends('adminlte::page')

@section('title', 'TapiCarpas')

@section('content_header')
<a href="{{url('factura_venta/')}}">Regresar</a>
@stop

@section('content')
<style>
body {
    background: grey;
    margin-top: 50px;
    margin-bottom: 100px;
}
</style>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="container">
    <div class="row">
        <div class="col-10">
            <div class="card">
                <div class="card-body p-0">
                    <div class="row p-5">
                        <div class="col-md-6">
                            <img src="{{asset('vendor/adminlte/dist/img/logotapicarpas.jpg')}}" width="100" height="100" >
                        </div>
                        <div class="col-md-6 text-right">
                            <p class="font-weight-bold mb-1">Factura de venta  #{{$datos->id}}</p>
                            <p class="text-muted">Fecha: {{$datos->created_at}}</p>
                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="row pb-1 p-5">
                        <div class="col-md-7">
                            <p class="font-weight-bold mb-1">Información</p>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <p class="font-weight-bold mb-1">Cliente:</p> {{$datos->cliente->nombre}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row p-5">
                        <div class="col-md-12">
                            <p class="font-weight-bold mb-1">Productos </p>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold">ID</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Descripción</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Cantidad</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Costo Unitario</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($datos->hp_facturas as $menu )
                                <tr>
                                        <td>{{$menu->id}}</td>
                                        <td>{{$menu->orden->orden_de_trabajo->nombre}}</td>
                                        <td>{{$menu->orden->orden_de_trabajo->cantidad_producto}}</td>
                                        <td>{{$menu->c_iva}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
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
                            <div class="mb-2">Total</div>
                            <div class="h2 font-weight-light" id ='total'>{{$datos->total_fv}} $</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@stop

@section('css')
<link rel="stylesheet" href="{{ asset('css/show_production_order.css') }}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

