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

    <label for="nombre_mp">Nombre</label>
    <input type="text" class="form-control" name="nombre_mp" value="{{isset($materia_prima->nombre_mp)?$materia_prima->nombre_mp:old('nombre_mp')}}" id="nombre_mp">


    <label for="color_mp">Color</label>
    <input type="text" class="form-control" name="color_mp" value="{{isset($materia_prima->color_mp)?$materia_prima->color_mp:old('color_mp')}}" id="color_mp">


    <label for="id_tipo">Unidad de medida</label>
    <select onclick="Habilitar()" class="form-control" type="text" name="id_tipo" value="{{isset($materia_prima->id_tipo)?$materia_prima->id_tipo:old('id_tipo')}}" id="id_tipo">
        @foreach ($tipo_materia_primas as $tipo_materia_primass)
                <option value="{{$tipo_materia_primass->id}}">
                    {{$tipo_materia_primass->id}} - {{$tipo_materia_primass->nombre_tipo}}
                </option>
        @endforeach

    </select>


</select>
    <script type="text/javascript">
    function Habilitar(){
        var seleccion=document.getElementById("id_tipo");
        var ancho=document.getElementById("ancho_mp");
        var largo=document.getElementById("largo_mp")
        if(seleccion.value != 1){
            ancho.disabled=true;
            largo.disabled=true;
        }else{
            ancho.disabled=false;
            largo.disabled=false;
        }
    }
    </script>


    <br/>

    <input class="btn btn-outline-success" type="submit" value="{{$modo}} datos">
    <a href="{{url('materia_prima/')}}">Regresar</a>

</div>



