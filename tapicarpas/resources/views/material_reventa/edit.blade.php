<form action="{{url('/material_reventa/'.$material_reventa->id)}}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}
    @include('material_reventa.form',['modo'=>'Editar ']);

</form>
