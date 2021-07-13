
<form action="{{url('/proveedor')}}" method="post" enctype="multipart/form-data">
@csrf

    @include('proveedor.form',['modo'=>'Crear '])

</form>
