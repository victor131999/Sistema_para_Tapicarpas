@extends('adminlte::page')

@section('title', 'TapiCarpas')

@section('content_header')
<a href="{{url('producto_a_fabricar/')}}">Regresar</a>
@stop

@section('content')
<style>
body {
    background: grey;
    margin-top: 120px;
    margin-bottom: 120px;
}
</style>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="row p-5">
                        <div class="col-md-6">
                            <img src="{{asset('vendor/adminlte/dist/img/logotapicarpas.jpg')}}" width="100" height="100" >
                            <p class="font-weight-bold mb-1">Producto:  {{$datos->orden_de_trabajo->nombre}}</p>
                        </div>
                        <div class="col-md-6 text-right">
                            <p class="font-weight-bold mb-1">Orden de Producción  #Or - 00{{$datos->id}}</p>
                            <p class="text-muted">Fecha: {{$datos->fecha_inicio}}</p>
                            <p class="text-muted">Estado: {{$datos->estado}}</p>
                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="row pb-1 p-5">
                        <div class="col-md-6">
                            <p class="font-weight-bold mb-4">Información</p>
                            <p class="font-weight-bold mb-4">Responsable de la Orden de Trabajo:</p>
                            <p class="mb-1"> {{$datos->orden_de_trabajo->responsables->Nombre}}</p>
                            <p class="font-weight-bold mb-4">Responsable de la Orden de Producción:</p>
                            <p class="mb-1"> {{$datos->responsables->Nombre}}</p>
                            <p class="font-weight-bold mb-4">Fecha de entrega:</p>
                            <p class="mb-1">{{$datos->fecha_fin}}</p>
                            <p class="font-weight-bold mb-4">Detalles de medidas:</p>
                            <p class="mb-1">{{$datos->orden_de_trabajo->medida}}</p>
                        </div>

                        <div class="col-md-6 text-right">
                            <p class="font-weight-bold mb-4">Detalle</p>
                            <p class="mb-1"><span class="text-muted">CATEGORIA: </span> {{$datos->orden_de_trabajo->sub_categorias->categoria->nombre ?? '' }} </p>
                            <p class="mb-1"><span class="text-muted">Sub Categoria: </span>{{$datos->orden_de_trabajo->sub_categorias->nombre ?? '' }}</p>
                            <p class="mb-1"><span class="text-muted">Material: {{$datos->orden_de_trabajo->material}}</p>
                            <p class="mb-1"><span class="text-muted">Color:  {{$datos->orden_de_trabajo->color}}</p>
                        </div>
                    </div>

                    <div class="row p-5">
                        <div class="col-md-12">
                        <p class="font-weight-bold mb-4" >Materia Prima</p>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold">ID</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Materiales</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Cantidad</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Costo Unitario</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($datos->orden_de_trabajo->hp_orden_trabajo_materia as $menu )
                                <tr>
                                        <td>{{$menu->id}}</td>
                                        <td>{{$menu->nombre_mp}}</td>
                                        <td>{{$menu->pivot->cantidad}}</td>
                                        <td>${{$menu->costo_unidad_mp}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex flex-row-reverse bg-dark text-white p-4">

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

