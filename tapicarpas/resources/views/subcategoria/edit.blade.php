<form action="{{url('/subcategoria/'.$subcategoria->id)}}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}
    @include('subcategoria.form',['modo'=>'Editar ']);

</form>
