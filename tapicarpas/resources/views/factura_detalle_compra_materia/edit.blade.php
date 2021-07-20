<form action="{{url('/factura_detalle_compra_materia/'.$factura_detalle_compra_materia->id)}}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}
    @include('factura_detalle_compra_materia.form',['modo'=>'Editar ']);

</form>
