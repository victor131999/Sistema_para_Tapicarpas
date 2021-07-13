
<form action="{{url('/responsable')}}" method="post" enctype="multipart/form-data">
@csrf

    @include('responsable.form',['modo'=>'Crear '])

</form>
