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

    <label for="Nombre">Nombre</label>
    <input type="text" class="form-control" name="Nombre" value="{{isset($proveedor->Nombre)?$proveedor->Nombre:old('Nombre')}}" id="Nombre">


    <label for="Direccion">Dirección</label>
    <input type="text" class="form-control" name="Direccion" value="{{isset($proveedor->Direccion)?$proveedor->Direccion:old('Direccion')}}" id="Direccion">


    <label for="Telefono">Teléfono</label>
    <input type="text"class="form-control" name="Telefono" value="{{isset($proveedor->Telefono)?$proveedor->Telefono:old('Telefono')}}" id="Telefono">

    <br/>

    <input class="btn btn-outline-success" type="submit" value="{{$modo}} datos">
    <a href="{{url('proveedor/')}}">Regresar</a>

</div>




