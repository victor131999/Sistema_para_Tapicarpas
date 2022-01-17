@extends('adminlte::page')

@section('title', 'TapiCarpas')

@section('content_header')
<a href="{{url('orden_trabajo/')}}">Regresar</a>
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
                            <p class="font-weight-bold mb-1">Cantidad del producto: {{$datos->cantidad_producto}} </p>
                            <p class="font-weight-bold mb-1">Cliente: {{$datos->clientes->nombre}} </p>
                        </div>
                        <div class="col-md-6 text-right">
                            <p class="font-weight-bold mb-1">Orden de trabajo  #{{$datos->id}}</p>
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
                                        <p class="font-weight-bold mb-1">Responsable:</p> {{$datos->responsables->Nombre}}
                                    </div>
                                    <div class="col">
                                        <p class="font-weight-bold mb-1">Material:</p> {{$datos->material}}
                                    </div>
                                    <div class="col">
                                        <p class="font-weight-bold mb-1">Color:</p> {{$datos->color}}
                                    </div>
                                    <div class="col">
                                        <p class="font-weight-bold mb-1">Categoría:</p> {{$datos->sub_categorias->nombre}}
                                    </div>
                                    <div class="col">
                                        <p class="font-weight-bold mb-1">Material:</p> {{$datos->material}}
                                    </div>

                                </div>
                    </div>
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col">
                                <p class="font-weight-bold mb-1">Detalles de Medidas</p> {{$datos->medida}}
                            </div>
                        </div>
                </div>
                    <div class="row p-20">
                        <div class="row pb-1 p-5">
                    <div class="col-md-7">
                            <p class="font-weight-bold mb-1">Materia prima</p>
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
                                @foreach ($datos->hp_orden_trabajo_materia as $menu )
                                <tr>
                                    <td>{{$menu->id}}</td>
                                    <td>{{$menu->nombre_mp}} - {{$menu->tipos->nombre_tipo}}</td>
                                    <td>{{$menu->pivot->cantidad}}</td>
                                    <td>${{$menu->costo_unidad_mp}}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col">
                                        <p class="font-weight-bold mb-0"> Costo de materia prima:</p>
                                    </div>
                                    <div class="col">
                                        <p >${{$datos->total_pf}}</p>
                                    </div>
                                </div>
                            </div>


                        <div class="col-md-12">
                            <p class="font-weight-bold mb-1">Mano de obra</p>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold">Nombre</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Horas</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Precio/Hora</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Costo x horas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($datos->hp_orden_trabajo_mano as $menu )
                                <tr>
                                    <td>{{$menu->nombre}}</td>
                                    <td>{{$menu->pivot->horas}}</td>
                                    <td>${{$menu->precio_hora}}</td>
                                    <td>${{$menu->pivot->horas_costo}}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row pb-1 p-5">
                            <div class="col-md-12">
                                <p class="font-weight-bold mb-1">Costos adicionales y mano de obra</p>
                                <br>
                                    <div class="row">
                                        <div class="col">
                                            <p class="font-weight-bold mb-1">Agua:</p> ${{$datos->c_agua}}
                                        </div>
                                        <div class="col">
                                            <p class="font-weight-bold mb-1">Luz:</p> ${{$datos->c_luz}}
                                        </div>
                                        <div class="col">
                                            <p class="font-weight-bold mb-1">Varios</p> ${{$datos->c_varios}}
                                        </div>
                                        <div class="col">
                                            <p class="font-weight-bold mb-1">Administración:</p> ${{$datos->c_admin}}
                                        </div>
                                        <div class="col">
                                            <p class="font-weight-bold mb-1">Total:</p> ${{$datos->total}}
                                        </div>
                                        <div class="col">
                                            <p class="font-weight-bold mb-1">Imprevistos 5%:</p> ${{$datos->c_imprevistos}}
                                        </div>
                                        <div class="col">
                                            <p class="font-weight-bold mb-1">Costo total:</p> ${{$datos->c_total}}
                                        </div>
                                        <div class="col">
                                            <p class="font-weight-bold mb-1">Utilidad:</p> ${{$datos->c_utilidad}}
                                        </div>
                                        <div class="col">
                                            <p class="font-weight-bold mb-1">Costo final con iva:</p> ${{$datos->c_iva}}
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

                                        <div class="py-3 px-12 text-right">
                                            <div class="mb-2">Total</div>
                                            <div class="h2 font-weight-light" id ='total'>${{$datos->c_iva}}</div>
                                        </div>
                                    </div>
                            </div>

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

