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

    <div class="row">
        <div class="col-md-3 col-lg-4">
            <div class="form-group">
                <label for="id_area">Area</label>
                <select wire:model="codA" class="form-control" type="text" name="id_area" value="{{isset($area->id_area)?$area->id_area:old('id_area')}}" id="id_area" onchange="colocar_codA()">
                    <option value="">Seleccione</option>
                    @foreach ($area as $areas)
                            <option value="{{$areas->id}}" codA="{{ $areas->cod }}">
                                {{$areas->cod}} - {{$areas->nombre}}
                            </option>
                    @endforeach
                </select>
            </div>
        </div>


        <div class="col-md-3 col-lg-4">
            <div class="form-group">
                <label for="id_clase">Clase</label>
                <select class="form-control" type="text" name="id_clase" value="{{isset($clase->id_clase)?$clase->id_clase:old('id_clase')}}" id="id_clase" onchange="colocar_codC()">
                    <option value="">Seleccione</option>
                    @foreach ($clase as $clases)
                            <option value="{{$clases->id}}" codC="{{ $clases->cod }}">
                                {{$clases->cod}} - {{$clases->nombre}}
                            </option>
                    @endforeach
                </select>
            </div>
        </div>


        <div class="col-md-3 col-lg-4">
            <div class="form-group">
                <label for="id_familia">Familia</label>
                <select  class="form-control" type="text" name="id_familia" value="{{isset($familia->id_familia)?$familia->id_familia:old('id_familia')}}" id="id_familia" onchange="colocar_codF()">
                    <option value="">Seleccione</option>
                    @foreach ($familia as $familias)
                            <option value="{{$familias->id}}" codF="{{ $familias->cod }}">
                                {{$familias->cod}} - {{$familias->nombre}}
                            </option>
                    @endforeach
                </select>
            </div>
        </div>

    </div>
    <div >
        <label >Código</label>
    </div>
    <div class="row">


        <div class="col-1">
            <input type="number"  class="form-control" name="codA" value="{{isset($herramienta->codA)?$herramienta->codA:old('codA')}}" id="codA" readonly>
        </div>
        <div class="col-1">
            <input type="number" class="form-control" name="codC" value="{{isset($herramienta->codC)?$herramienta->codC:old('codC')}}" id="codC" readonly>
        </div>
        <div class="col-1">
            <input type="number"  class="form-control" name="codF" value="{{isset($herramienta->codF)?$herramienta->codF:old('codF')}}" id="codF" readonly>
        </div>
        <div class="col-1">
            <input type="number" class="form-control" name="codI" value="{{isset($herramienta->codI)?$herramienta->codI:old('codI')}}" id="codI" readonly>
        </div>
        <!--
            <div class="col-1">
                <input class="btn btn-outline-success" onclick="generar_codigo()" value="Generar">

            </div>
        -->

    </div>

    <div class="row">
        <div class="col-3">
            <label for="Nombre">Nombre</label>
            <input type="text" class="form-control" name="Nombre" value="{{isset($herramienta->Nombre)?$herramienta->Nombre:old('Nombre')}}" id="Nombre">
        </div>

        <div class="col-3">
            <label for="marca">Marca</label>
            <input type="text" class="form-control" name="marca" value="{{isset($herramienta->marca)?$herramienta->marca:old('marca')}}" id="marca">
        </div>

        <div class="col-3">
            <label for="modelo">Modelo</label>
            <input type="text" class="form-control" name="modelo" value="{{isset($herramienta->modelo)?$herramienta->modelo:old('modelo')}}" id="modelo">
        </div>

        <div class="col-3">
            <label for="">Costo por unidad de la herramienta</label>
            <input type="number" step="any" class="form-control" name="costo" value="{{isset($herramienta->costo)?$herramienta->costo:old('costo')}}" id="costo">
        </div>

    </div>

    <br/>

    <input class="btn btn-outline-success" type="submit" value="{{$modo}} datos">
    <a href="{{url('herramienta/')}}">Regresar</a>

</div>

<script>
    function colocar_codA() {
        let codA = $("#id_area option:selected").attr("codA");
        $("#codA").val(codA);
        generar_codigo();
    }

    function colocar_codC() {
        let codC = $("#id_clase option:selected").attr("codC");
        $("#codC").val(codC);
        generar_codigo();
    }

    function colocar_codF() {
        let codF = $("#id_familia option:selected").attr("codF");
        $("#codF").val(codF);
        generar_codigo();
    }

    function generar_codigo(){
        let codA = $("#id_area option:selected").attr("codA");
        let codC = $("#id_clase option:selected").attr("codC");
        let codF = $("#id_familia option:selected").attr("codF");
        if(codA == null || codC == null || codF == null ) return;

        $.ajax({
            url: '/api/herramienta/verificar_codigo',
            data: {
                "codA":codA,
                "codC":codC,
                "codF":codF
            },
            type: 'POST',
            dataType: 'json',
            success: function(value){
                $("#codI").val(value);
            },
            error:  function(json, xhr, status){
                console.warn('error');
            },
            complete: function(json, xhr, status){
                console.log('finished')
            }
        })
    }



</script>




