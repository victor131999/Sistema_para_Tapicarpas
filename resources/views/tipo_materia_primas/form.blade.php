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

    <label for="nombre_tipo">Nombre del tipo</label>
    <input type="text" class="form-control" placeholder="Ejm: metros cuadrados" name="nombre_tipo" value="{{isset($tipo_materia_primas->nombre_tipo)?$tipo_materia_primas->nombre_tipo:old('nombre_tipo')}}" id="nombre_tipo">


    <label for="descripcion_tipo">Descripción</label>
    <input type="text" class="form-control" name="descripcion_tipo" placeholder="Ejm:mt2" value="{{isset($tipo_materia_primas->descripcion_tipo)?$tipo_materia_primas->descripcion_tipo:old('descripcion_tipo')}}" id="descripcion_tipo">

    <br/>

    <input class="btn btn-outline-success" type="submit" value="{{$modo}} datos">
    <a href="{{url('tipo_materia_primas/')}}">Regresar</a>

</div>



