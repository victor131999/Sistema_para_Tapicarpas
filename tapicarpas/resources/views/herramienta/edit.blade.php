<form action="{{url('/herramienta/'.$herramienta->id)}}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}
    @include('herramienta.form',['modo'=>'Editar ']);

</form>
