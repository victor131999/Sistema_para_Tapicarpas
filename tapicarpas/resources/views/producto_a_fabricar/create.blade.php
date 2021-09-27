
<form action="{{url('/producto_a_fabricar')}}" method="post" enctype="multipart/form-data">
@csrf

    @include('producto_a_fabricar.form',['modo'=>'Crear '])

</form>
