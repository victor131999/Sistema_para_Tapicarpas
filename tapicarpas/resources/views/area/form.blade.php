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
    <input type="text" class="form-control" name="nombre" value="{{isset($area->nombre)?$area->nombre:old('nombre')}}" id="nombre">
    <br/>
    <label for="cod">Código</label>
    <input type="number" class="form-control" name="cod" value="{{isset($area->cod)?$area->cod:old('cod')}}" id="cod">
    <br/>
    <input class="btn btn-outline-success" type="submit" value="{{$modo}} datos">
    <a href="{{url('area/')}}">Regresar</a>

</div>




