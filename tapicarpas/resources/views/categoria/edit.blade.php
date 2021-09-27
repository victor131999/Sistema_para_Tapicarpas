<form action="{{url('/categoria/'.$categoria->id)}}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}
    @include('categoria.form',['modo'=>'Editar ']);

</form>
