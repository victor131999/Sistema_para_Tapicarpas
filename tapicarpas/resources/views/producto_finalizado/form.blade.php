
@extends('adminlte::page')

@section('title', 'TapiCarpas')

@section('content_header')
    <h1>Producto</h1>

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

    <div class="container">
        <div class="row">
            <div class="col-3">
                <label for="c_agua">Costo de agua</label>
                <input type="text" class="form-control" name="c_agua" value="{{isset($producto_finalizado->c_agua)?$producto_finalizado->c_agua:old('c_agua')}}" id="c_agua">
            </div>
            <div class="col-3">
                <label for="c_luz">Costo de luz</label>
                <input type="text" class="form-control" name="c_luz" value="{{isset($producto_finalizado->c_luz)?$producto_finalizado->c_luz:old('c_luz')}}" id="c_luz">
            </div>
            <div class="col-3">
                <label for="c_varios">Costo varios</label>
                <input type="text" class="form-control" name="c_varios" value="{{isset($producto_finalizado->c_varios)?$producto_finalizado->c_varios:old('c_varios')}}" id="c_varios">
            </div>
            <div class="col-3">
                <label for="c_admin">Costo de administración</label>
                <input type="text" class="form-control" name="c_admin" value="{{isset($producto_finalizado->c_admin)?$producto_finalizado->c_admin:old('c_admin')}}" id="c_admin">
            </div>
        </div>
    </div>

        <br>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPrimaNormal" data-whatever="@mdo">Agregar mano de obra</button>
        <br>
        <table class="table">
            <thead>
                <tr><th>Nombre</th><th>Horas</th><th>Costo por hora</th><th>Costo total</th><th>Opciones</th></tr>
            </thead>
            <tbody id="tblManoObra"></tbody>
        </table>
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <label for="total">Subtotal</label>
                    <input class="form-control" id="subtotal" readonly></input>
                </div>
            </div>
        </div>
        <p></p>
       <div class="container">
            <div class="row">
                <div class="col-2">
                    <label for="total">Total</label>
                    <input id  = "total" type="text" class="form-control" name="total" value="{{isset($producto_finalizado->total)?$producto_finalizado->total:old('total')}}" readonly>
                </div>
                <div class="col-2">
                    <label for="c_imprevistos">Imprevistos</label>
                    <input id  = "c_imprevistos" type="text" class="form-control" name="c_imprevistos" value="{{isset($producto_finalizado->c_imprevistos)?$producto_finalizado->c_imprevistos:old('total')}}" readonly>
                </div>
                <div class="col-2">
                    <label for="c_total">Costo total</label>
                    <input id  = "c_total" type="text" class="form-control" name="c_total" value="{{isset($producto_finalizado->c_total)?$producto_finalizado->c_total:old('c_total')}}" id="c_total" readonly>
                </div>
                <div class="col-2">
                    <label for="c_utilidad">Costo utilidad</label>
                    <input id  = "c_utilidad" type="text" class="form-control" name="c_utilidad" value="{{isset($producto_finalizado->c_utilidad)?$producto_finalizado->c_utilidad:old('c_utilidad')}}" id="c_utilidad" readonly>
                </div>
                <div class="col-2">
                    <label for="c_iva">Costo mas iva</label>
                    <input id  = "c_iva" type="text" class="form-control" name="c_iva" value="{{isset($producto_finalizado->c_iva)?$producto_finalizado->c_iva:old('c_iva')}}" id="c_iva" readonly>
                </div>
            </div>
        </div>

        <br/>

        <input class="btn btn-outline-success" type="submit" value="Guardar">
        <a href="{{url('producto_finalizado/')}}">Regresar</a>

    </div>

    <!-MODAL PARA EL INGRESOO DE MATERIA PRIMA PARA PRODUCCION COMO DETALLE-!>
    <div class="modal fade" id="modalPrimaNormal" tabindex="-1" role="dialog" aria-labelledby="modalPrimaNormalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="modalPrimaNormalLabel">Mano de obra</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <div class="row card-body">
            <div class="col-6">
                <div class="form-group">
                    <label for="">Mano de obra</label>

                    <select name="mano_obras" id="mano_obras" class="form-control" onchange="colocar_costo()">
                        <option value="">Seleccione</option>
                        @foreach ($mano_de_obra as $mano_de_obras)
                            <option cantidad="{{ $mano_de_obras->precio_hora }}" costoUnitario="{{ $mano_de_obras->costo_unidad_mp }}"  value="{{$mano_de_obras->id}} ">
                                {{$mano_de_obras->nombre}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="">Horas</label>
                    <input type="number" id="cantidad_df" class="form-control">
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="">Precio/hora </label>
                    <input type="number" id="cantidad" class="form-control" readonly>


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
        let identificarRepetidos = [];

        function agregar_insumo() {
            var TR= document.createElement("tr");
            let insumo_id = $("#mano_obras option:selected").val();
            let insumo_text = $("#mano_obras option:selected").text();
            let cantidad = $("#cantidad_df").val();
            let costo = $("#cantidad").val();
            let costohora  =  (parseFloat(costo)) * parseFloat(cantidad) ;

            let agua = $("#c_agua").val();
            let luz = $("#c_luz").val();
            let varios = $("#c_varios").val();
            let administracion = $("#c_admin").val();

            let subtotal2 = (parseFloat(agua)) + (parseFloat(luz)) + (parseFloat(varios)) + (parseFloat(administracion));

            if (identificarRepetidos.includes(parseInt(insumo_id)) === false) {
                    identificarRepetidos.push(parseInt(insumo_id));
                    if (cantidad > 0 && costo > 0) {
                        $("#tblManoObra").append(`
                                <tr id="tr-${insumo_id}">
                                    <td>
                                        <input type="hidden" name="insumo_id[]" id="education1" value="${insumo_id}" />
                                        <input type="hidden" name="cantidades[]"  value="${cantidad}" />
                                        <input type="hidden" name="costos[]" value="${costohora}" />
                                        ${insumo_text}
                                    </td>
                                    <td>${cantidad}</td>
                                    <td>${costo}</td>
                                    <td>${costohora}</td>
                                    <td>
                                        <button type="button" class="btn btn-danger" onclick="eliminar_insumo(this, ${insumo_id},${costohora})">X</button>
                                    </td>
                                </tr>
                            `);

                let costoU_df_total = $("#subtotal").val() || 0;
                $("#subtotal").val(parseFloat(costoU_df_total) + parseFloat(costohora));
                $("#total").val(parseFloat( $("#subtotal").val()) + parseFloat(subtotal2) );
                $("#c_imprevistos").val(parseFloat( $("#total").val()) * (5/100) );
                $("#c_total").val(parseFloat( $("#total").val()) + parseFloat( $("#c_imprevistos").val()));
                $("#c_utilidad").val(parseFloat( $("#c_total").val()) * (1.35));
                $("#c_iva").val(parseFloat( $("#c_utilidad").val()) * (1.12));

                    } else {
                        alert("Se debe ingresar una cantidad o costo valido");
                    }
            }else{
                alert('Ya seleccionó  el articulo');
                return;
            }
            document.getElementById("tblManoObra").appendChild(TR)
        }

        function eliminar_insumo(id, elemento, subtotal) {
                var TR= id.parentNode.parentNode;
                document.getElementById("tblManoObra").removeChild(TR);

                let costoU_df_total = $("#subtotal").val() || 0;
                $("#subtotal").val(parseFloat(costoU_df_total) - subtotal);

                let fascturaSub = $("#total").val() || 0;
                $("#total").val(parseFloat(fascturaSub) - subtotal );

                let impre = $("#total").val() || 0;
                $("#c_imprevistos").val(parseFloat(impre) * (5/100) );

                let cTotal = $("#c_total").val() || 0;
                $("#c_total").val(((parseFloat(fascturaSub) - subtotal)+(parseFloat(impre) * (5/100))) );

                let CUtilidad = $("#c_utilidad").val() || 0;
                $("#c_utilidad").val(((parseFloat(fascturaSub) - subtotal)+(parseFloat(impre) * (5/100))) * (1.35));

                let CIva = $("#c_iva").val() || 0;
                $("#c_iva").val((((parseFloat(fascturaSub) - subtotal)+(parseFloat(impre) * (5/100))) * (1.35)) * (1.12));

                console.log(elemento)
                var index = identificarRepetidos.indexOf(elemento);
                console.log(index)
                if (index > -1) {
                    identificarRepetidos.splice(index, 1);
                }
                console.log(identificarRepetidos)
        }

        function colocar_costo() {
            let precio = $("#mano_obras option:selected").attr("cantidad");
            $("#cantidad").val(precio);
            let costoUnitario = $("#mano_obras option:selected").attr("costoUnitario");
            $("#costoUnitario").val(costoUnitario);
        }

    </script>

@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
