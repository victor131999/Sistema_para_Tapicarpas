
<form action="{{url('/facturacompra')}}" method="post" enctype="multipart/form-data">
@csrf

    @include('facturacompra.form',['modo'=>'Crear '])

</form>
