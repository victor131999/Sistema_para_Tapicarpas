
<form action="{{url('/materia_prima')}}" method="post" enctype="multipart/form-data">
@csrf

    @include('materia_prima.form',['modo'=>'Crear '])

</form>
