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
        </div>
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
                                <label class="control-label">Nombre del Producto</label>
                                <input type="text" class="form-control" name="nombre" value="{{isset($categoria->nombre)?$categoria->nombre:old('nombre')}}" id="nombre">
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

                    <div class="col-md-1 col-lg-1">
                        <div class="form-group">
                        <label for="medida">Medida</label>
                        <input type="text" class="form-control" name="medida" placeholder="3 x 5" value="{{isset($categoria->medida)?$categoria->medida:old('medida')}}" id="medida">

                        </div>
                    </div>
                    <div class="col-md-1 col-lg-1">
                        <div class="form-group">
                        <label for="estado">Estado</label>
                        <input type="text" class="form-control" name="estado" placeholder="Inicio" value="{{isset($categoria->medida)?$categoria->medida:old('estado')}}" id="estado">

                        </div>
                    </div>
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
                <tr><th>Nombre</th><th>Cantidad</th> <th>Costo Unitario</th><th>Opciones</th></tr>
            </thead>
            <tbody id="tblmaterias"></tbody>
        </table>
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
                            <option cantidad="{{ $materia_primas->cantidad_mp }}" costoUnitario="{{ $materia_primas->costo_unidad_mp }}"  value="{{$materia_primas->id}} ">
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
                    <label for="">En stock </label>
                    <input type="number" id="cantidad" class="form-control" readonly>
                    <input type="hidden" id="costoUnitario"  />

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
        let identificarRepetidos = []
        function agregar_insumo() {
            var TR= document.createElement("tr");
            let insumo_id = $("#materias option:selected").val();
            let insumo_text = $("#materias option:selected").text();
            let cantidad = $("#cantidad_df").val();
            let stock = $("#cantidad").val();
            let costoUnitario = parseFloat($("#costoUnitario").val());
            let restando  =  (parseFloat(stock)) - parseFloat(cantidad) ;
            if (identificarRepetidos.includes(parseInt(insumo_id)) === false) {
                    identificarRepetidos.push(parseInt(insumo_id));
                    if (cantidad > 0 && stock > 0) {
                        $("#tblmaterias").append(`
                                <tr id="tr-${insumo_id}">
                                    <td>
                                        <input type="hidden" name="insumo_id[]" id="education1" value="${insumo_id}" />
                                        <input type="hidden" name="cantidades[]"  value="${cantidad}" />
                                        <input type="hidden" name="stocks[]" value="${restando}" />
                                        <input type="hidden" name="costosUnitarios[]" value="${costoUnitario}" />
                                        ${insumo_text}
                                    </td>
                                    <td>${cantidad}</td>
                                    <td>${costoUnitario} $</td>
                                    <td>
                                        <button type="button" class="btn btn-danger" onclick="eliminar_insumo(this, ${insumo_id})">X</button>
                                    </td>
                                </tr>
                            `);
                    } else {
                        alert("Se debe ingresar una cantidad o stock valido");
                    }
                    }else{
                        alert('Ya seleccionó  el articulo');
                        return;
                    }
                    document.getElementById("tblmaterias").appendChild(TR)
        }

        function eliminar_insumo(id, elemento) {
                var TR= id.parentNode.parentNode;
                document.getElementById("tblmaterias").removeChild(TR);
                console.log(elemento)
                var index = identificarRepetidos.indexOf(elemento);
                console.log(index)
                if (index > -1) {
                    identificarRepetidos.splice(index, 1);
                }
                console.log(identificarRepetidos)
        }
        function colocar_stock() {
            let precio = $("#materias option:selected").attr("cantidad");
            $("#cantidad").val(precio);
            let costoUnitario = $("#materias option:selected").attr("costoUnitario");
            $("#costoUnitario").val(costoUnitario);
        }

    </script>

@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop




