
<form action="{{url('/factura_detalle_compra_materia')}}" method="post" enctype="multipart/form-data">
@csrf

    @include('factura_detalle_compra_materia.form',['modo'=>'Crear '])

</form>
