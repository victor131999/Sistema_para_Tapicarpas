@extends('adminlte::page')

@section('title', 'TapiCarpas')

@section('content_header')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
         <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>



@stop

@section('content')

    <div class="form-gourp">

        @if(count($errors)>0)
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>

            </div>
        @endif
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


        <div class="container">
            <div id="accordion">
                <div class="row">

                    <div class="col-lg-12">
                        <div class="text-center">
                            <h3>Registrar Orden de producción</h3>
                </div>

                <div class="card card-default">
                    <div class="card-header">
                        <h4 class="card-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                <i class="glyphicon glyphicon-search text-gold"></i>
                                <b>Información</b>
                            </a>
                        </h4>
                    </div>
                    <div id="collapse1" class="collapse show">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-3 col-lg-7">
                                    <div class="form-group">
                                        <label for="id_responsable">Responsable</label>
                                        <select class="form-control" type="text" name="id_responsable" value="{{isset($categoria->id_responsable)?$categoria->id_responsable:old('id_responsable')}}" id="id_responsable">
                                            @foreach ($responsable as $responsables)
                                                    <option value="{{$responsables->id}}">
                                                        {{$responsables->id}} - {{$responsables->Nombre}}
                                                    </option>
                                            @endforeach

                                        </select>

                                    </div>
                                </div>
                               
                            </div>
                            <div class="row">

                                <div class="col-md-3 col-lg-7">
                                    <div class="form-group">
                                        <label for="orden_trabajo_id">Orden de Trabajo / Cantidad del producto</label>
                                        <select  data-live-search="true" class="form-control" type="text" name="orden_trabajo_id" value="{{isset($categoria->orden_trabajo_id)?$categoria->orden_trabajo_id:old('orden_trabajo_id')}}" id="orden_trabajo_id">
                                            @foreach ($orden_trabajo as $orden_trabajos)
                                                    <option value="{{$orden_trabajos->id}}">
                                                         {{$orden_trabajos->nombre}} / {{$orden_trabajos->cantidad_producto}}
                                                    </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                               
                            </div>

                            <div class="row">
                                <div class="col-md-2 col-lg-3">
                                    <div class="form-group">
                                    <label for="fecha_inicio">Fecha de inicio</label>
                                    <input type="date" class="form-control" name="fecha_inicio" value="{{isset($categoria->fecha_inicio)?$categoria->fecha_inicio:old('fecha_inicio')}}" id="fecha_inicio">

                                    </div>
                                </div>

                                <div class="col-md-3 col-lg-3">
                                    <div class="form-group">
                                    <label for="fecha_fin">Fecha de Finalización</label>
                                    <input type="date" class="form-control" name="fecha_fin" value="{{isset($categoria->fecha_fin)?$categoria->fecha_fin:old('fecha_fin')}}" id="fecha_fin">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        
                        <input class="btn btn-outline-success" type="submit" value="{{$modo}} datos">
                        <a href="{{url('producto_a_fabricar/')}}">Regresar</a>

                    </div>
                </div>
            </div>
        </div>

    </div>


@stop

@section('css')

@stop

@section('js')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script> $('.form-control').selectpicker();</script>

@stop




