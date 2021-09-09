
<form action="{{url('/herramienta')}}" method="post" enctype="multipart/form-data">
@csrf

    @include('herramienta.form',['modo'=>'Crear '])

</form>
