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
    <input type="text" class="form-control" name="nombre" value="{{isset($categoria->nombre)?$categoria->nombre:old('nombre')}}" id="nombre">
    <br/>

    <input class="btn btn-outline-success" type="submit" value="{{$modo}} datos">
    <a href="{{url('categoria/')}}">Regresar</a>

</div>




