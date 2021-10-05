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
                            <p class="font-weight-bold mb-1">Producto:  {{$datos->nombre}}</p>
                        </div>
                        <div class="col-md-6 text-right">
                            <p class="font-weight-bold mb-1">Orden de Producción  #{{$datos->id}}</p>
                            <p class="text-muted">Fecha: {{$datos->fecha_inicio}}</p>
                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="row pb-1 p-5">
                        <div class="col-md-6">
                            <p class="font-weight-bold mb-4">Información</p>
                            <p class="mb-1">Responsable : {{$datos->responsables->Nombre}}</p>
                            <p class="mb-1">Fecha de entrega : {{$datos->fecha_fin}}</p>
                            <p class="mb-1">Medida:  {{$datos->medida}}</p>  
                                <div class="row">
                                    <div class="col">
                                   Material: {{$datos->material}} 
                                    </div>
                                    <div class="col">
                                   Color:  {{$datos->color}}
                                    </div>
                                </div>
                        </div>

                        <div class="col-md-6 text-right">
                            <p class="font-weight-bold mb-4">Detalle</p>
                            <p class="mb-1"><span class="text-muted">CATEGORIA: </span> {{$datos->categorias->nombre ?? '' }} </p>
                            <p class="mb-1"><span class="text-muted">Sub Categoria: </span> 10253642</p>
                        </div>
                    </div>

                    <div class="row p-5">
                        <div class="col-md-12">
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
                                @foreach ($datos->hpProductoFabricar as $menu )
                                <tr>
                                        <td>{{$menu->id}}</td>
                                        <td>{{$menu->nombre_mp}}</td>
                                        <td>{{$menu->pivot->cantidad}}</td>
                                        <td>{{$menu->costo_unidad_mp}}</td>
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
                            <div class="h2 font-weight-light" id ='total'>{{$total}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="text-light mt-5 mb-5 text-center small">by : <a class="text-light" target="_blank" href="http://totoprayogo.com">totoprayogo.com</a></div>

</div>



@stop

@section('css')
<link rel="stylesheet" href="{{ asset('css/show_production_order.css') }}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

