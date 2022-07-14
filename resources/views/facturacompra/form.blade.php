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
            <div class="col-6">
            <input type="hidden" class="form-control" name="idFact" id="idFact" value="{{isset($facturacompra->id)?$facturacompra->id:old('id')}}" id="idFact">

                <label for="id_prov">Proveedor</label>
                <select  class="form-control" type="text" name="id_prov" value="{{isset($facturacompra->id_prov)?$facturacompra->id_prov:old('id_prov')}}" id="id_prov">
                    @foreach ($proveedor as $proveedors)
                            <option value="{{$proveedors->id}} ">
                                {{$proveedors->id}} - {{$proveedors->Nombre}}
                            </option>
                    @endforeach
            </select>
            </div>
            <div class="col-6">
                <label for="id_prov">Responsable</label>
            <select  class="form-control" type="text" name="id_resp" value="{{isset($facturacompra->id_resp)?$facturacompra->id_resp:old('id_resp')}}" id="id_resp">
                    @foreach ($responsable as $responsables)
                            <option value="{{$responsables->id}} ">
                                {{$responsables->nombre_tipo}} - {{$responsables->Nombre}}
                            </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-4">
            <label for="bienes_servicios_sinIva_fac">Bienes o servicios sin iva</label>
            <input type="number" step="any"  class="form-control" name="bienes_servicios_sinIva_fac" id="bienes_servicios_sinIva_fac" value="{{isset($facturacompra->bienes_servicios_sinIva_fac)?$facturacompra->bienes_servicios_sinIva_fac:old('bienes_servicios_sinIva_fac')}}" required id="bienes_servicios_sinIva_fac">
            </div>
            <div class="col-4">
            <label for="bienes_conIva_fac">Bienes con iva</label>
            <input type="number" step="any"  required class="form-control" name="bienes_conIva_fac" id="bienes_conIva_fac" value="{{isset($facturacompra->bienes_conIva_fac)?$facturacompra->bienes_conIva_fac:old('bienes_conIva_fac')}}" id="bienes_conIva_fac">
            </div>
            <div class="col-4">
            <label for="servicios_conIva_fac">Servicios con iva</label>
            <input type="number" step="any" required class="form-control" name="servicios_conIva_fac" id="servicios_conIva_fac" value="{{isset($facturacompra->servicios_conIva_fac)?$facturacompra->servicios_conIva_fac:old('servicios_conIva_fac')}}" id="servicios_conIva_fac">
            </div>
        </div>
    </div>
    <label for="descripcion_fac">Descripción</label>
    <input type="text" class="form-control" required name="descripcion_fac" value="{{isset($facturacompra->descripcion_fac)?$facturacompra->descripcion_fac:old('descripcion_fac')}}" id="descripcion_fac">
    <br>
    <!-LLAMADA AL MODAL PARA MATERIA PRIMA -!>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPrimaNormal" data-whatever="@mdo">Agregar materia prima</button>
    <td>
        <br>
    <br>
    <input type="hidden" id = 'identificador' name="identificador"  />
    <table class="table">
        <thead>
            <tr><th>Nombre</th><th>Cantidad</th><th>costo por unidad</th><th>Sub Total</th><th>Opciones</th></tr>
        </thead>

        @if(count($detalles)>0)
        <tbody id="tblmaterias">
                            @foreach($detalles as $valor)

                            <tr id="tr-{{$valor->id_mp}}">

                            <td>
                            <input type="hidden" name="insumo_id[]" value="{{$valor->id_mp}}" />
                            <input type="hidden" name="cantidades[]" value="{{$valor->cantidad_df}}" />
                            <input type="hidden" name="costos[]" value="{{$valor->costoU_df}}" />
                            <input type="hidden" name="subtotales[]" value="{{$valor->subtotal_df}}" />
                            {{$valor->mp}}
                            </td>
                                <td>{{$valor->cantidad_df}}</td>
                                <td>${{$valor->costoU_df}}</td>
                                <td>${{$valor->subtotal_df}}</td>
                                <td>
                            <button type="button" class="btn btn-danger" onclick="eliminar_insumo(this,{{$valor->subtotal_df}},{{$valor->id}})">X</button>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
        @endif
        @if(count($detalles)<= 0)
            <tbody id="tblmaterias"></tbody>
        @endif
    </table>
    <p></p>
    <br/>
    <label for="total_fac">Subtotal de factura</label>
    <input id  = "total_fac" type="text" class="form-control" name="total_fac" value="{{isset($facturacompra->subtotal_fac)?$facturacompra->subtotal_fac:old('subtotal_fac')}}" readonly>
    <br>
    <label for="total">Total de factura</label>
    <input id  = "total" type="text" class="form-control" name="total" value="{{isset($facturacompra->total_fac)?$facturacompra->total_fac:old('total_fac')}}" id="total" readonly>
    <br>
    <input class="btn btn-outline-success" type="submit" value="{{$modo}} datos">
    <a href="{{url('facturacompra/')}}">Regresar</a>
</div>
<!-MODAL PARA EL INGRESOO DE MATERIA PRIMA PARA PRODUCCION COMO DETALLE-!>
<div class="modal fade" id="modalPrimaNormal" tabindex="-1" role="dialog" aria-labelledby="modalPrimaNormalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="modalPrimaNormalLabel">Materia prima</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    <div class="row card-body">
        <div class="col-6">
            <div class="form-group">
                <label for="">Nombre</label>
                <select name="materias" id="materias" class="form-control" onchange="colocar_precio()">
                    <option value="">Seleccione</option>
                    @foreach ($materia_prima as $materia_primas)
                        <option precio="{{ $materia_primas->costo_unidad_mp }}" value="{{$materia_primas->id}} ">
                            {{$materia_primas->nombre_mp}} - {{$materia_primas->tipos->nombre_tipo}}
                        </option>
                    @endforeach
                    <a href="{{url('materia_prima/create')}}"  class='addMateria'>Registrar nueva materia prima</a>
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
                <input type="number" id="costoU_df" class="form-control" >
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
    /* event listener */
    document.getElementsByName("bienes_servicios_sinIva_fac")[0].addEventListener('change', doThing);

    /* function */
    function doThing(){
        let fascturaSub = parseFloat($("#bienes_servicios_sinIva_fac").val()) +parseFloat( $("#bienes_conIva_fac").val())+parseFloat( $("#servicios_conIva_fac").val());
        let costoU_df_total = $("#total_fac").val() || 0;

            $("#total").val(parseFloat(costoU_df_total)+parseFloat(fascturaSub));
        // return this.value;
    }
    let identificar = []
    function agregar_insumo() {
        var TR= document.createElement("tr");
        let insumo_id = $("#materias option:selected").val();
        let insumo_text = $("#materias option:selected").text();
        let cantidad = $("#cantidad_df").val();
        let costoU_df = $("#costoU_df").val();
        let fascturaSub = parseFloat($("#bienes_servicios_sinIva_fac").val()) +parseFloat( $("#bienes_conIva_fac").val())+parseFloat( $("#servicios_conIva_fac").val());
        if (cantidad > 0 && costoU_df > 0) {

            $("#tblmaterias").append(`
                    <tr id="tr-${insumo_id}">
                        <td>
                            <input type="hidden" name="insumo_id[]" value="${insumo_id}" />
                            <input type="hidden" name="cantidades[]" value="${cantidad}" />
                            <input type="hidden" name="costos[]" value="${costoU_df}" />
                            <input type="hidden" name="subtotales[]" value="${parseFloat(cantidad) * parseFloat(costoU_df)}" />
                            ${insumo_text}
                        </td>

                        <td>${cantidad}</td>
                        <td>$${costoU_df}</td>
                        <td>$${parseFloat(cantidad) * parseFloat(costoU_df)}</td>
                        <td>
                            <button type="button" class="btn btn-danger" onclick="eliminar_insumo(this, ${parseFloat(cantidad) * parseFloat(costoU_df)},0)">X</button>
                        </td>
                    </tr>
                `);
            let costoU_df_total = $("#total_fac").val() || 0;
            $("#total_fac").val(parseFloat(costoU_df_total) + parseFloat(cantidad) * parseFloat(costoU_df));
            $("#total").val(parseFloat( $("#total_fac").val()) + parseFloat(fascturaSub) );
            $("#cantidad_df").val(null);
            $("#costoU_df").val(null);

        } else {
            alert("Se debe ingresar una cantidad o costoU_df valido");
        }
        document.getElementById("tblmaterias").appendChild(TR)
    }

    function eliminar_insumo(id, subtotal, iden) {

        if (identificador==0) {
            var TR= id.parentNode.parentNode;
            document.getElementById("tblmaterias").removeChild(TR);
            let costoU_df_total = $("#total_fac").val() || 0;
            $("#total_fac").val(parseFloat(costoU_df_total) - subtotal);
            let fascturaSub = $("#total").val() || 0;
            $("#total").val(parseFloat(fascturaSub) - subtotal );
        } else {
            var TR= id.parentNode.parentNode;
            document.getElementById("tblmaterias").removeChild(TR);
            let costoU_df_total = $("#total_fac").val() || 0;
            $("#total_fac").val(parseFloat(costoU_df_total) - subtotal);
            let fascturaSub = $("#total").val() || 0;
            $("#total").val(parseFloat(fascturaSub) - subtotal );
            identificar.push(iden);
            $("#identificador").val(identificar);
            // $("#identificador[]").val(arrayN);
        }
    }

    function colocar_precio() {
    let precio = $("#materias option:selected").attr("precio");
    console.log(precio);
    $("#costoU_df").val(parseFloat(precio));
    }

</script>



