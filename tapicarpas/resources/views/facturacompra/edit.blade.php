<form action="{{url('/facturacompra/'.$facturacompra->id)}}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}
    @include('facturacompra.form',['modo'=>'Editar ']);

</form>
