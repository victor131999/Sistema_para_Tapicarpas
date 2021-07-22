
<form action="{{url('/tipo_materia_primas')}}" method="post" enctype="multipart/form-data">
@csrf

    @include('tipo_materia_primas.form',['modo'=>'Crear '])

</form>
