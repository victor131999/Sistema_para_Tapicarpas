<form action="{{url('/producto_a_fabricar/'.$producto_a_fabricar->id)}}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}
@extends('adminlte::page')

@section('title', 'TapiCarpas')

@section('content_header')
    <h1>Editar Producto a fabricar</h1>

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

        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" name="nombre" value="{{isset($producto_a_fabricar->nombre)?$producto_a_fabricar->nombre:old('nombre')}}" id="nombre">

        <label for="id_categoria">Categorías</label>
        <select class="form-control" type="text" name="id_categoria"  id="id_categoria">
            @foreach ($categoria as $categorias)
                    <option value="{{$categorias->id}}" {{ ($producto_a_fabricar->id_categoria ? $producto_a_fabricar->id_categoria: old('id_categoria')) == $categorias->id ? 'selected' : '' }}>
                         {{$categorias->nombre}}
                    </option>
            @endforeach

       </select>

       <label for="id_responsable">Responsable</label>
       <select class="form-control" type="text" name="id_responsable"  id="id_responsable">
           @foreach ($responsable as $responsables)
                   <option value="{{$responsables->id}}">
                       {{$responsables->id}} - {{$responsables->Nombre}}
                   </option>
           @endforeach

      </select>
        <label for="fecha_inicio">Fecha de inicio</label>
        <input type="text" class="form-control" name="fecha_inicio" value="{{isset($producto_a_fabricar->fecha_inicio)?$producto_a_fabricar->fecha_inicio:old('fecha_inicio')}}" id="fecha_inicio">

        <label for="fecha_fin">Fecha de Finalización</label>
        <input type="text" class="form-control" name="fecha_fin" value="{{isset($producto_a_fabricar->fecha_fin)?$producto_a_fabricar->fecha_fin:old('fecha_fin')}}" id="fecha_fin">

        <label for="color">Color</label>
        <input type="text" class="form-control" name="color" value="{{isset($producto_a_fabricar->color)?$producto_a_fabricar->color:old('color')}}" id="color">

        <label for="medida">Medida</label>
        <input type="text" class="form-control" name="medida" value="{{isset($producto_a_fabricar->medida)?$producto_a_fabricar->medida:old('medida')}}" id="medida">

        <label for="material">Material</label>
        <input type="text" class="form-control" name="material" value="{{isset($producto_a_fabricar->material)?$producto_a_fabricar->material:old('material')}}" id="material">
        <br>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPrimaNormal" data-whatever="@mdo">Agregar materia prima</button>
        <br>
        <table class="table">
            <thead>
                <tr><th>Nombre</th><th>Cantidad</th><th>Costo Unitario</th><th>Opciones</th></tr>
            </thead>
            @if(count($valor)>0)
            <tbody id="tblmaterias">
                                @foreach($valor as $detalles )
                                <tr id="tr-${insumo_id}">
                                    <td>
                                        <input type="hidden" name="insumo_id[]" id="education1" value="${insumo_id}" />
                                        <input type="hidden" name="cantidades[]"  value="${cantidad}" />
                                        <input type="hidden" name="stocks[]" value="${restando}" />
                                        <input type="hidden" name="costosUnitarios[]" value="${costoUnitario}" />
                                        {{$detalles->nombre_mp}}
                                    </td>
                                    <td>{{$detalles->pivot->cantidad}}</td>
                            
                                    <td>{{$detalles->costo_unidad_mp}}</td>
                                    <td>
                                        <button type="button" class="btn btn-danger" onclick="eliminar_insumo(this, ${insumo_id})">X</button>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
            @endif
            @if(count($valor)<= 0)
                <tbody id="tblmaterias"></tbody>
            @endif
        </table>
        <p></p><br/> <br/>
        <input class="btn btn-outline-success" type="submit" value="Editar datos">
        <a href="{{url('producto_a_fabricar/')}}">Regresar</a>

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
                                    <td>${restando}</td>
                                    <td>${costoUnitario}</td>
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






</form>
