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
                            <h3>Registrar factura</h3>
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
                        <div class="container">
                            <div class="row">
                                <div class="col-6">
                                    <div class="col-md-3 col-lg-12">
                                        <div class="form-group">
                                            <label for="cliente_id">Cliente</label>
                                            <select  data-live-search="true" class="form-control" type="text" name="cliente_id" value="{{isset($cliente_id)?$cliente_id:old('cliente_id')}}" id="cliente_id" onchange="colocar_producto()">
                                                @foreach ($cliente as $clienteData)
                                                        <option value="{{$clienteData->id}}">
                                                            {{$clienteData->id}} - {{$clienteData->nombre}}
                                                        </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalPrimaNormalLabel">Productos finalizados</h5>
                                        </div>
                                        <div class="row card-body">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="">Producto</label>
                                                    <select name="materias_name" id="materias" class="form-control" onchange="colocar_cantidad()"></select>  
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="">cantidades</label>
                                                    <input type="number" id="cantidades" class="form-control" readonly>
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
                        </div>
                           
                        </div>
                        <div class="card-header">
                            <h4 class="card-title">
                                <a >
                                    <b>Detalles</b></br>
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
                                    <label for="">Costo total </label>
                                    <input type="text" class="form-control" name="total_pf" value="{{isset($categoria->nombre)?$categoria->nombre:old('total_pf')}}" id="total_pf" readonly>
                                </div>
                            </div>
                        <p></p><br/> <br/>
                        <input class="btn btn-outline-success" type="submit" value="{{$modo}} datos">
                        <a href="{{url('factura_venta/')}}">Regresar</a>
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
    <script> $('#cliente_id').selectpicker();</script>
    <script>
        let identificarRepetidos1 = []
        function agregar_insumos() {
            var TR= document.createElement("tr");
            let insumos_id = $("#materias option:selected").val();
            let insumos_text = $("#materias option:selected").text();
            let cantidades = $("#cantidades").val();
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
                                        <input type="hidden" name="costosUnitarios[]" value="${costoUnitario}" />
                                        ${insumos_text}
                                    </td>
                                    <td>${cantidades}</td>
                                    <td>${costoUnitario} $</td>
                                    <td>
                                        <button type="button" class="btn btn-danger" onclick="eliminar_insumos(this, ${insumos_id},${parseFloat(costoUnitario)})">X</button>
                                    </td>
                                </tr>
                            `);

                            let total_pf = $("#total_pf").val() || 0;
                            $("#total_pf").val(parseFloat(total_pf) + 1 * parseFloat(costoUnitario));
                    } else {
                        alert("Se debe ingresar una cantidad valida");
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
                var index = identificarRepetidos1.indexOf(elemento);
                if (index > -1) {
                    identificarRepetidos1.splice(index, 1);
                }
                let total_pf = $("#total_pf").val() || 0;
                $("#total_pf").val(parseFloat(total_pf) - parseFloat(subtotal));
        }
        function colocar_producto(){
            
            let id_cliente = $("#cliente_id option:selected").val();
                if(!id_cliente){
                    $("#materias").html("<option >Seleccione</option>");
                }
                $.get('/api/facturas_venta/'+id_cliente+'/finalizado',function(data){
                    var html_select='<option value="">Seleccione el producto</option>'
                    for(var i=0;i<data.length;i++)
                            html_select+='<option value="'+data[i].id+'" cantidad= "'+data[i]['orden']['orden_de_trabajo'].cantidad_producto+'" costoUnitario= "'+data[i].c_iva+'" >'+data[i].orden.orden_de_trabajo['nombre']+'</option>';
                            $('#materias').html(html_select);
                });
        }
        function colocar_cantidad() {
            let precio = $("#materias option:selected").attr("cantidad");
            $("#cantidades").val(precio);
            let costoUnitario = $("#materias option:selected").attr("costoUnitario");
            $("#costoUnitario").val(costoUnitario);
        }
        
    </script>
@stop




