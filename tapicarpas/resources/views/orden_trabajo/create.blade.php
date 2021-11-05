
<form action="{{url('/orden_trabajo')}}" method="post" enctype="multipart/form-data">
@csrf

    @include('orden_trabajo.form',['modo'=>'Crear '])

</form>
