
<form action="{{url('/material_reventa')}}" method="post" enctype="multipart/form-data">
@csrf

    @include('material_reventa.form',['modo'=>'Crear '])

</form>
