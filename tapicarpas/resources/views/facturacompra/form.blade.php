@extends('adminlte::page')

@section('title', 'TapiCarpas')

@section('content_header')
    <h1>{{$modo}}Factura de compra</h1>

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

        <label for="id_prov">Proveedor</label>
        <select  class="form-control" type="text" name="id_prov" value="{{isset($facturacompra->id_prov)?$facturacompra->id_prov:old('id_prov')}}" id="id_prov">
            @foreach ($proveedor as $proveedors)
                    <option value="{{$proveedors->id}} ">
                        {{$proveedors->id}} - {{$proveedors->Nombre}}
                    </option>
            @endforeach

       </select>

       <label for="id_prov">Responsable</label>
       <select  class="form-control" type="text" name="id_resp" value="{{isset($facturacompra->id_resp)?$facturacompra->id_resp:old('id_resp')}}" id="id_resp">
            @foreach ($responsable as $responsables)
                    <option value="{{$responsables->id}} ">
                        {{$responsables->nombre_tipo}} - {{$responsables->Nombre}}
                    </option>
            @endforeach

        </select>

        <label for="bienes_servicios_sinIva_fac">Bienes o servicios sin iva</label>
        <input type="text" class="form-control" name="bienes_servicios_sinIva_fac" value="{{isset($facturacompra->bienes_servicios_sinIva_fac)?$facturacompra->bienes_servicios_sinIva_fac:old('bienes_servicios_sinIva_fac')}}" id="bienes_servicios_sinIva_fac">


        <label for="bienes_conIva_fac">Bienes o servicios con iva</label>
        <input type="text" class="form-control" name="bienes_conIva_fac" value="{{isset($facturacompra->bienes_conIva_fac)?$facturacompra->bienes_conIva_fac:old('bienes_conIva_fac')}}" id="bienes_conIva_fac">


        <label for="servicios_conIva_fac">Servicios con iva</label>
        <input type="text"class="form-control" name="servicios_conIva_fac" value="{{isset($facturacompra->servicios_conIva_fac)?$facturacompra->servicios_conIva_fac:old('servicios_conIva_fac')}}" id="servicios_conIva_fac">

        <label for="descripcion_fac">Descripción</label>
        <input type="text" class="form-control" name="descripcion_fac" value="{{isset($facturacompra->descripcion_fac)?$facturacompra->descripcion_fac:old('descripcion_fac')}}" id="descripcion_fac">

        <br>
        <!-LLAMADA AL MODAL PARA MATERIA PRIMA NORMAL-!>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPrimaNormal" data-whatever="@mdo">Agregar materia prima normal </button>
        <td>

        <!-LLAMADA AL MODAL PARA MATERIA PRIMA REVENTA-!>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPrimaReventa" data-whatever="@mdo">Agregar materia prima reventa </button>
        <br>
        <br>

        <label for="total_fac">Total de factura</label>
        <input type="text" class="form-control" name="total_fac" value="{{isset($facturacompra->total_fac)?$facturacompra->total_fac:old('total_fac')}}" id="total_fac">

        <br/>

        <input class="btn btn-outline-success" type="submit" value="{{$modo}} datos">
        <a href="{{url('facturacompra/')}}">Regresar</a>

    </div>

    <!-MODAL PARA EL INGRESOO DE MATERIA PRIMA PARA PRODUCCION COMO DETALLE-!>
    <div class="modal fade" id="modalPrimaNormal" tabindex="-1" role="dialog" aria-labelledby="modalPrimaNormalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalPrimaNormalLabel">Materia prima normal</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Recipient:</label>
                <input type="text" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Message:</label>
                <textarea class="form-control" id="message-text"></textarea>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Send message</button>
          </div>
        </div>
      </div>
    </div>

    <!-MODAL PARA EL INGRESOO DE MATERIA PRIMA PARA REVENTA COMO DETALLE-!>
    <div class="modal fade" id="modalPrimaReventa" tabindex="-1" role="dialog" aria-labelledby="modalPrimaReventaLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalPrimaReventaLabel">Materia prima reventa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Recipient:</label>
                <input type="text" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Message:</label>
                <textarea class="form-control" id="message-text"></textarea>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Send message</button>
          </div>
        </div>
      </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop




