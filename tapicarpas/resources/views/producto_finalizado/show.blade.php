@extends('adminlte::page')

@section('title', 'TapiCarpas')

@section('content_header')
<a href="{{url('producto_finalizado/')}}">Regresar</a>
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
                            <p class="font-weight-bold mb-1">Producto final  #{{$datos->id}}</p>
                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="row pb-1 p-5">
                        <div class="col-md-6">
                            <p class="font-weight-bold mb-4">Información</p>
                            <p class="mb-1">Producto : {{$datos->id_orden}}</p>
                            <p class="mb-1">Imprevistos : {{$datos->c_imprevistos}}</p>
                            <p class="mb-1">Costo total :  {{$datos->c_total}}</p>
                                <div class="row">
                                    <div class="col">
                                   sub total: {{$datos->c_total}}
                                    </div>
                                    <div class="col">
                                   Utilidad:  {{$datos->c_utilidad}}
                                    </div>
                                </div>
                        </div>

                    </div>

                    <div class="row p-5">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold">ID</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Nombre</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Hora</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Costo por hora</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($datos->mano_obra_has_producto_f as $menu )
                                <tr>
                                        <td>{{$menu->id}}</td>
                                        <td>{{$menu->c_agua}}</td>
                                        <td>{{$menu->c_luz}}</td>
                                        <td>{{$menu->total}}</td>
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

