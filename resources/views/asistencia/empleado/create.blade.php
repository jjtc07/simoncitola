@extends('layouts.base')
<style type="text/css">
	.seleccionada{
		background-color: #41499B;
		color: white;
	}
</style>

@section('contenido')	
<div class="clearfix"></div>

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12 text-center">
    <h1 class="">Listado de Empleados</h1>
  </div>
</div>
<div class="row">
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
 <div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      @if($id==1)
          <h2>Lista de empleaEmpleados que aun no han entrado a la institucion</h2>
      @else
          <h2>Lista de empleaEmpleados que no han salido de la institucion</h2>
      @endif
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Settings 1</a>
            </li>
            <li><a href="#">Settings 2</a>
            </li>
          </ul>
        </li>
        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    @if($id==3)
      @include('asistencia.empleado._table_inasistencia', ['empleados' => $empleados, 'id' => $id]);
      @include('asistencia.empleado._modal');
    @else
      @include('asistencia.empleado._table_asistencia', ['empleados' => $empleados, 'id' => $id]);
    @endif
</div>




@section('js')
<script type="text/javascript" src={{ URL::asset('js/asistenciaEmpleado/acciones.js') }}></script>
@endsection

@endsection