<form action="{{url('/mano_de_obra/'.$mano_de_obra->id)}}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}
    @include('mano_de_obra.form',['modo'=>'Editar ']);

</form>
