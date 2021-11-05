<form action="{{url('/clase/'.$clase->id)}}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}
    @include('clase.form',['modo'=>'Editar ']);

</form>
