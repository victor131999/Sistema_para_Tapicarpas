
<form action="{{url('/familia')}}" method="post" enctype="multipart/form-data">
@csrf

    @include('familia.form',['modo'=>'Crear '])

</form>
