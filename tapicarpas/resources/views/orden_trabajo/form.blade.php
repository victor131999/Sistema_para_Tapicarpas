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
                            <h3>Registrar Orden de trabajo</h3>
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
                                    <div class="col-md-3 col-lg-12">
                                        <div class="form-group">
                                            <label for="cliente_id">Cliente</label>
                                            <select  data-live-search="true" class="form-control" type="text" name="cliente_id" value="{{isset($cliente_id)?$cliente_id:old('cliente_id')}}" id="cliente_id">
                                                @foreach ($cliente as $cliente)
                                                        <option value="{{$cliente->id}}">
                                                            {{$cliente->id}} - {{$cliente->nombre}}
                                                        </option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-lg-10">
                                        <div class="form-group">
                                            <label class="control-label">Nombre del Producto</label>
                                            <input type="text" class="form-control" name="nombre" value="{{isset($categoria->nombre)?$categoria->nombre:old('nombre')}}" id="nombre">
                                        </div>
                                    </div>
                                    <div class="col-md-1 col-lg-2">
                                        <div class="form-group">
                                            <label for="cantidad_producto">Cantidad de productos</label>
                                            <input type="number"  required name="cantidad_producto" min='0' class="form-control" placeholder="3" value="{{isset($cantidad_producto)?$cantidad_producto:old('cantidad_producto')}}" id="cantidad_producto">
                                        </div>
                                    </div>
                                </div>
                                
                            <div class="row">

                                <div class="col-md-3 col-lg-4">
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
                                <div class="col-md-1 col-lg-4">
                                    <div class="form-group">
                                    <label for="id_s_categoria">Subcategorías</label>
                                            <select class="form-control" type="text" name="id_s_categoria" value="{{isset($subcategoria->id)?$subcategoria->id:old('id_s_categoria')}}" id="id_s_categoria">
                                                @foreach ($subcategoria as $categorias)
                                                        <option value="{{$categorias->id}}">
                                                            {{$categorias->id}} - {{$categorias->nombre}}
                                                        </option>
                                                @endforeach


                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 col-lg-3">
                                    <div class="form-group">
                                    <label for="material">Material</label>
                                    <input type="text" class="form-control" name="material" value="{{isset($categoria->material)?$categoria->material:old('material')}}" id="material">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="color">Color</label>
                                        <input type="text" class="form-control" name="color" value="{{isset($categoria->color)?$categoria->color:old('color')}}" id="color">

                                    </div>
                                </div>
                                <div class="col-md-1 col-lg-7">
                                    <div class="form-group">
                                    <label for="medida"> Medida o Detalle de medida</label>
                                    <input type="text" class="form-control" name="medida" placeholder="3 x 5" value="{{isset($categoria->medida)?$categoria->medida:old('medida')}}" id="medida">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-header">
                            <h4 class="card-title">
                                <a >
                                    <b>Detalles</b></br>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPrimaNormal" data-whatever="@mdo">Agregar materiales</button>
                                </a>
                            </h4>
                        </div>
                        <br>
                        <table class="table">
                            <thead>
                                <tr><th>Nombre</th><th>cantidades</th> <th>Costo Unitario</th><th>Opciones</th></tr>
                            </thead>
                            <tbody id="tblmaterias"></tbody>
                        </table>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Precio de materia prima </label>
                                    <input type="text" class="form-control" name="total_pf" value="{{isset($categoria->nombre)?$categoria->nombre:old('total_pf')}}" id="total_pf" readonly>
                                </div>
                            </div>

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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPrimaNormal1" data-whatever="@mdo">Agregar mano de obra</button>
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

                        <p></p><br/> <br/>
                        <input class="btn btn-outline-success" type="submit" value="{{$modo}} datos">
                        <a href="{{url('producto_a_fabricar/')}}">Regresar</a>

                    </div>
                </div>
            </div>
        </div>

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

                    <select name="materias" id="materias" class="form-control" onchange="colocar_stock()">
                        <option value="">Seleccione</option>
                        @foreach ($materia_prima as $materia_primas)
                            <option cantidades="{{ $materia_primas->cantidades_mp }}" costoUnitario="{{ $materia_primas->costo_unidad_mp }}"  value="{{$materia_primas->id}} ">
                                {{$materia_primas->nombre_mp}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="">cantidades</label>
                    <input type="number" id="cantidades_df" class="form-control">
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <input type="hidden" id="costoUnitario"  />
                </div>
            </div>
            <div class="col-12">
                <button onclick="agregar_insumos()" type="button"
                    class="btn btn-success float-right">Agregar</button>
            </div>
        </div>
        </div>
      </div>
    </div>


    <!-MODAL PARA EL INGRESOO DE MATERIA PRIMA PARA PRODUCCION COMO DETALLE-!>
    <div class="modal fade" id="modalPrimaNormal1" tabindex="-1" role="dialog" aria-labelledby="modalPrimaNormalLabel" aria-hidden="true">
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
                            <option cantidad_mano="{{ $mano_de_obras->precio_hora }}" costoUnitario="{{ $mano_de_obras->costo_unidad_mp }}"  value="{{$mano_de_obras->id}} ">
                                {{$mano_de_obras->nombre}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="">Horas</label>
                    <input type="number" id="cantidad_mano_df" class="form-control">
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="">Precio/hora </label>
                    <input type="number" id="cantidad_mano" class="form-control" readonly>


                </div>
            </div>
            <div class="col-12">
                <button onclick="agregar_mano()" type="button"
                    class="btn btn-success float-right">Agregar</button>
            </div>
        </div>
        </div>
        </div>
    </div>

    <script>
        let identificarRepetidos1 = []
        function agregar_insumos() {
            var TR= document.createElement("tr");
            let insumos_id = $("#materias option:selected").val();
            let insumos_text = $("#materias option:selected").text();
            let cantidades = $("#cantidades_df").val();
            let costoUnitario = parseFloat($("#costoUnitario").val());
            let restando  =  parseFloat(cantidades) ;
            if (identificarRepetidos1.includes(parseInt(insumos_id)) === false) {
                    identificarRepetidos1.push(parseInt(insumos_id));
                    if (cantidades > 0 ) {
                        $("#tblmaterias").append(`
                                <tr id="tr-${insumos_id}">
                                    <td>
                                        <input type="hidden" name="insumos_id[]" id="education1" value="${insumos_id}" />
                                        <input type="hidden" name="cantidadeses[]"  value="${cantidades}" />
                                        <input type="hidden" name="stocks[]" value="${restando}" />
                                        <input type="hidden" name="costosUnitarios[]" value="${costoUnitario}" />
                                        ${insumos_text}
                                    </td>
                                    <td>${cantidades}</td>
                                    <td>${costoUnitario} $</td>
                                    <td>
                                        <button type="button" class="btn btn-danger" onclick="eliminar_insumos(this, ${insumos_id},${parseInt(cantidades) * parseInt(costoUnitario)})">X</button>
                                    </td>
                                </tr>
                            `);

                            let total_pf = $("#total_pf").val() || 0;
                            $("#total_pf").val(parseFloat(total_pf) + parseFloat(cantidades) * parseFloat(costoUnitario));
                    } else {
                        alert("Se debe ingresar una cantidades o stock valido");
                    }
                    }else{
                        alert('Ya seleccionó  el articulo');
                        return;
                    }
                    document.getElementById("tblmaterias").appendChild(TR)
        }

        function eliminar_insumos(id, elemento,subtotal) {
                var TR= id.parentNode.parentNode;
                document.getElementById("tblmaterias").removeChild(TR);
                console.log(elemento)
                var index = identificarRepetidos1.indexOf(elemento);
                console.log(index)
                if (index > -1) {
                    identificarRepetidos1.splice(index, 1);
                }
                console.log(identificarRepetidos1)
                let total_pf = $("#total_pf").val() || 0;
                $("#total_pf").val(parseInt(total_pf) - subtotal);
        }
        function colocar_stock() {
            let precio = $("#materias option:selected").attr("cantidades");
            $("#cantidades").val(precio);
            let costoUnitario = $("#materias option:selected").attr("costoUnitario");
            $("#costoUnitario").val(costoUnitario);
        }

    </script>

<script>
    let identificarRepetidos = [];

    function agregar_mano() {
        var TR= document.createElement("tr");
        let insumo_id = $("#mano_obras option:selected").val();
        let insumo_text = $("#mano_obras option:selected").text();
        let cantidad_mano = $("#cantidad_mano_df").val();
        let costo = $("#cantidad_mano").val();
        let costoManoObra = $("#total_pf").val();
        let costohora  =  (parseFloat(costo)) * parseFloat(cantidad_mano) ;
        let agua = $("#c_agua").val();
        let luz = $("#c_luz").val();
        let varios = $("#c_varios").val();
        let administracion = $("#c_admin").val();

        let subtotal2 = (parseFloat(agua)) + (parseFloat(luz)) + (parseFloat(varios)) + (parseFloat(administracion));

        if (identificarRepetidos.includes(parseInt(insumo_id)) === false) {
                identificarRepetidos.push(parseInt(insumo_id));
                if (cantidad_mano > 0 ) {
                    $("#tblManoObra").append(`
                            <tr id="tr-${insumo_id}">
                                <td>
                                    <input type="hidden" name="mano_id[]" id="education1" value="${insumo_id}" />
                                    <input type="hidden" name="horas[]"  value="${cantidad_mano}" />
                                    <input type="hidden" name="costos[]" value="${costohora}" />
                                    ${insumo_text}
                                </td>
                                <td>${cantidad_mano}</td>
                                <td>${costo}</td>
                                <td>${costohora}</td>
                                <td>
                                    <button type="button" class="btn btn-danger" onclick="eliminar_insumo(this, ${insumo_id},${costohora})">X</button>
                                </td>
                            </tr>
                        `);

            let costoU_df_total = $("#subtotal").val() || 0;
            $("#subtotal").val(parseFloat(costoU_df_total) + parseFloat(costohora));
            $("#total").val(parseFloat( $("#subtotal").val()) + parseFloat(subtotal2) + parseFloat(costoManoObra));
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
        let precio = $("#mano_obras option:selected").attr("cantidad_mano");
        $("#cantidad_mano").val(precio);
        let costoUnitario = $("#mano_obras option:selected").attr("costoUnitario");
        $("#costoUnitario").val(costoUnitario);
    }

</script>


@stop

@section('css')

@stop

@section('js')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script> $('.form-control').selectpicker();</script>
@stop




