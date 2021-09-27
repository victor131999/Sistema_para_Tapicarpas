<form action="{{url('/producto_a_fabricar/'.$producto_a_fabricar->id)}}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}
    @include('producto_a_fabricar.form',['modo'=>'Editar ']);

</form>
