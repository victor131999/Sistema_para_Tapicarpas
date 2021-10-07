
<form action="{{url('/subcategoria')}}" method="post" enctype="multipart/form-data">
@csrf

    @include('subcategoria.form',['modo'=>'Crear '])

</form>
