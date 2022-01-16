
<form action="{{url('/factura_venta')}}" method="post" enctype="multipart/form-data">
@csrf

    @include('factura_venta.form',['modo'=>'Crear '])

</form>
