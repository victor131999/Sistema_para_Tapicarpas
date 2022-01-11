
@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <h1>Bienvenido</h1>
@stop

@section('content')

    <!-- menu el cuerpo -->
  <!-- Content Wrapper. Contains page content -->

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Panel de Control</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$NumOrdenesProduccion->id}}</h3>

                <p>Ordenes de producción</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{url('producto_a_fabricar/')}}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$NumProductosFinalizados->id}}<sup style="font-size: 20px"></sup></h3>

                <p>Productos finalizados</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{url('producto_finalizado/')}}" class="small-box-footer">Más información<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$NumClientes->id}}</h3>

                <p>Clientes registrados</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{url('cliente/')}}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Materia</h3>

                <p>Por año determinado</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{url('cliente/')}}" class="small-box-footer">Ver estadísticas <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <!-- /.row -->
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <div id="chart-container"></div>
        <!-- Main row -->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
<script>
    var datas = "<?php echo json_encode ($datas)?>"
    var datass = datas.split(',').map(_=>_|0);
    var costocompra = "<?php echo json_encode ($egresofacturacompra)?>"
    //alert(datas)
    //alert(typeof datas)
    //alert(datass)
    //alert(typeof datass)

    Highcharts.chart('chart-container',{
        title:{
            text: 'Compra de materia prima'
        },
        subtitle:{
            text: 'El monto total invertido en la materia prima en el mes actual es: $'+costocompra
        },
        xAxis:{
            categories: ['Diciembre','Enero', 'Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre']
        },
        yAxis:{
            title:{
                text: 'Monto de la compra'
            }
        },
        legend:{
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'

        },
        plotOptions:{
            series:{
                allowPointSelect: true
            }
        },
        series:[{
            name: 'El monto en el mes es $',
            data: datass
        }],
        responsive:{
            rules:[{
                condition:{
                    maxwidth:500
                },
                chartOptions:{
                    legend:{
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    }

    )
</script>

@stop



