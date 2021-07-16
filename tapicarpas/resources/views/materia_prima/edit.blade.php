<form action="{{url('/materia_prima/'.$materia_prima->id)}}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}
    @include('materia_prima.form',['modo'=>'Editar ']);

</form>
