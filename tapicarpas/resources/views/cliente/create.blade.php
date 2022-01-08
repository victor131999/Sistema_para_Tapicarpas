
<form action="{{url('/cliente')}}" method="post" enctype="multipart/form-data">
@csrf

    @include('cliente.form',['modo'=>'Crear '])

</form>
