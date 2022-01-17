
@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>Clientes</h1>
@stop

@section('content')


@if(Session::has('mensaje'))
<div class="alert alert-success alert-dismissible" role="alert">
    {{Session::get('mensaje')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif



<a href="{{url('cliente/create')}}" class="btn btn-outline-success">Registrar cliente</a>
<br/>
<br/>
<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>#/{{$Numdatos = DB::table('clientes')->count()}}</th>
            <th>Nombre</th>
            <th>Cédula</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach($clientes as $key => $cliente)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$cliente->nombre}}</td>
            <td>{{$cliente->cedula}}</td>
            <td>{{$cliente->direccion}}</td>
            <td>{{$cliente->telefono}}</td>
            <td>{{$cliente->correo}}</td>
            <td>
                <a href="{{url('/cliente/'.$cliente->id.'/edit')}}" class="btn btn-outline-info">
                    Editar
                </a>
             <!--   |
                <form action="{{url('/cliente/'.$cliente->id)}}" class="d-inline" method="post">
                @csrf
                {{method_field('DELETE')}}
                    <input class="btn btn-outline-dark" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                </form> -->
            </th>
        </tr>
        @endforeach
    </tbody>
</table>
{!!$clientes->links()!!}
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

