<form action="{{url('/tipo_materia_primas/'.$tipo_materia_primas->id)}}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}
    @include('tipo_materia_primas.form',['modo'=>'Editar ']);

</form>
