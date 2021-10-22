@extends('adminlte::page')

@section('title', 'TapiCarpas')

@section('content_header')
    <h1>Detalle </h1>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
@stop

@section('content')

<div class="container">  
  <div class="container-fluid mt-3 mb-4">

		<div class="col-lg-12">
			<div class="row">
				<div class="col-lg-9 px-0 pr-lg-2 mb-2 mb-lg-0">
					<div class="card border-light bg-white card proviewcard shadow-sm">
						<div class="card-header">{{$materia_prima->nombre_mp}}      | ID:  {{$materia_prima->id}}. {{$materia_prima->id_tipo}} </div>
						<div class="card-body">
							<div class="col-lg-12 p-3 cardlist">
								<div class="col-lg-12">
									<div class="row">
										<div class="col-lg-8">
											<div class="row">
												
												<div class="col-8 col-lg-9 col-xl-10">
													<div class="d-block text-truncate mb-1">
														<p class="cartproname"> <b>Color : </b> {{$materia_prima->color_mp}}</p>
													</div>
													<div class="seller d-block">
														<span> <b>Costo Actual: </b> </span>
														<span>{{$materia_prima->costo_unidad_mp}} $</span>
													</div>
													<div class="cartviewprice d-block">
														<span class="amt"> <b>En Stock: </b> </span>
														<span class="oldamt">{{$materia_prima->cantidad_mp}} {{$materia_prima->tipos->nombre_tipo}}</span>
													</div>
												</div>
											</div>
											
										</div>
										<div class="col-lg-3 ml-lg-auto align-self-start mt-2 mt-lg-0">
											<div class="row">
												<div class="prostatus">
													<span class="del-time"> <b>Unidad de medida: </b> <span>{{$materia_prima->tipos->descripcion_tipo}}</span></span>
												</div>
                                                <div class="cartviewprice d-block">
														<span class="amt"> <b>Cantidad Total:  </b> <span>{{$detallesSumaCantidad}} {{$materia_prima->tipos->nombre_tipo}}</span> </span>
														<span class="oldamt"> <b>Inversion : </b><span>{{$detallesInversion}} $</span></span>
                                                        
													</div>
											</div>
										</div>
									</div>
								</div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p>Entradas  : Comprobantes de pago</p>
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Fecha</th>
        <th>Tipo - Codigo - Detalle</th>
        <th>Costo Unitario</th>
        <th>Cantidad</th>
        <th>Costo Total</th>
      </tr>
    </thead>
    <tbody id="myTable">
    @foreach ($detalles as $detalle)
      <tr>
        <td>{{\Carbon\Carbon::parse($detalle->facturaDeCompra->created_at)->format('d M')}}</td>
        <td>Fac - {{$detalle->facturaDeCompra->id}}.{{$detalle->id}}</td>
        <td>{{$detalle->costoU_df}} $</td>
        <td>{{$detalle->cantidad_df}} {{$materia_prima->tipos->nombre_tipo}}</td>
        <td>{{$detalle->subtotal_df}} $</td>
      </tr>
    @endforeach
    </tbody>
  </table>
  </div>
      
@stop

@section('css')

@stop

@section('js')
    <script> $(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
}); </script>
@stop

