
<form action="{{url('/producto_finalizado')}}" method="post" enctype="multipart/form-data">
@csrf

    @include('producto_finalizado.form',['modo'=>'Crear '])

</form>
