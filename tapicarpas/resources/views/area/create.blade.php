
<form action="{{url('/area')}}" method="post" enctype="multipart/form-data">
@csrf

    @include('area.form',['modo'=>'Crear '])

</form>
