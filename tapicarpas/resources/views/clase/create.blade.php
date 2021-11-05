
<form action="{{url('/clase')}}" method="post" enctype="multipart/form-data">
@csrf

    @include('clase.form',['modo'=>'Crear '])

</form>
