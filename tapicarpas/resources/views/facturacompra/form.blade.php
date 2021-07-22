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

        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>costoU_df</th>
                    <th>Sub Total</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody id="tblmaterias">

            </tbody>
        </table>


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
        <div class="row card-body">
            <div class="col-6">
                <div class="form-group">
                    <label for="">Nombre</label>
                    <select name="materias" id="materias" class="form-control" onchange="colocar_costoU_df()">
                        @foreach ($materia_prima as $materia_primas)
                            <option value="{{$materia_primas->id}} ">
                                {{$materia_primas->nombre_mp}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="">Cantidad</label>
                    <input type="number" id="cantidad_df" class="form-control">
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="">Costo unitario</label>
                    <input type="number" id="costoU_df" class="form-control">
                </div>
            </div>


            <div class="col-12">
                <button onclick="agregar_insumo()" type="button"
                    class="btn btn-success float-right">Agregar</button>
            </div>
        </div>
        </div>
      </div>
    </div>

    <!-MODAL PARA EL INGRESOO DE MATERIA PRIMA PARA REVENTA COMO DETALLE-!>
    <div class="modal fade" id="modalPrimaReventa" tabindex="-1" role="dialog" aria-labelledby="modalPrimaReventaLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPrimaNormalLabel">Materia prima Reventa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <div class="row card-body">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Nombre</label>
                        <select name="materias" id="materias" class="form-control" onchange="colocar_costoU_df()">
                            <option value="">Seleccione</option>
                            <option >hola</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="">Cantidad</label>
                        <input type="number" id="cantidad" class="form-control">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="">costoU_df</label>
                        <input id="costoU_df" type="text" class="form-control" readonly>
                    </div>
                </div>
                <div class="col-12">
                    <button onclick="agregar_insumo()" type="button"
                        class="btn btn-success float-right">Agregar</button>
                </div>
            </div>
        </div>
      </div>
    </div>

    <script>
        function colocar_costoU_df() {
            let costoU_df = $("#materias option:selected").attr("costoU_df");
            $("#costoU_df").val(costoU_df);
        }

        function agregar_insumo() {
            let insumo_id = $("#materias option:selected").val();
            let insumo_text = $("#materias option:selected").text();
            let cantidad = $("#cantidad_df").val();
            let costoU_df = $("#costoU_df").val();

            if (cantidad > 0 && costoU_df > 0) {

                $("#tblmaterias").append(`
                        <tr id="tr-${insumo_id}">
                            <td>
                                <input type="hidden" name="insumo_id[]" value="${insumo_id}" />
                                <input type="hidden" name="cantidades[]" value="${cantidad}" />
                                ${insumo_text}
                            </td>
                            <td>${cantidad}</td>
                            <td>${costoU_df}</td>
                            <td>${parseInt(cantidad) * parseInt(costoU_df)}</td>
                            <td>${insumo_id}</td>
                            <td>
                                <button type="button" class="btn btn-danger" onclick="eliminar_insumo(${insumo_id}, ${parseInt(cantidad) * parseInt(costoU_df)})">X</button>
                            </td>
                        </tr>
                    `);
                let costoU_df_total = $("#costoU_df_total").val() || 0;
                $("#costoU_df_total").val(parseInt(costoU_df_total) + parseInt(cantidad) * parseInt(costoU_df));
            } else {
                alert("Se debe ingresar una cantidad o costoU_df valido");
            }
        }


        function eliminar_insumo(id, subtotal) {
            document.getElementById('tblmaterias').deleteRow("#tr-" + id);
            let costoU_df_total = $("#costoU_df_total").val() || 0;
            $("#costoU_df_total").val(parseInt(costoU_df_total) - subtotal);
        }

    </script>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop




