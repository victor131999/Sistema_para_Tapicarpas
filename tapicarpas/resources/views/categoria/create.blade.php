
<form action="{{url('/categoria')}}" method="post" enctype="multipart/form-data">
@csrf

    @include('categoria.form',['modo'=>'Crear '])

</form>
