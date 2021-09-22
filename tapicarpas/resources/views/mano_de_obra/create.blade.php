
<form action="{{url('/mano_de_obra')}}" method="post" enctype="multipart/form-data">
@csrf

    @include('mano_de_obra.form',['modo'=>'Crear '])

</form>
