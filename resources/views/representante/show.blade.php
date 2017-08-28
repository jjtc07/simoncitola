@extends('layouts.base')

@section('contenido')

  <div class="form-horizontal form-label-left">
		@include('representante._form', ['representante' => $representante, 'disabled' => $disabled])



		<div class="row"> {{-- INFORMACION DE HIJOS Y REPRESENTADOS --}}
		  <div class="col-md-12 col-xs-12">
		    <div class="x_panel">
		      <div class="x_title">
		        <h2> Hijo(s) y Representados </h2>
		        <ul class="nav navbar-right panel_toolbox">
		          <li><a class=""><i class=""></i> </a>
		          <li><a class=""><i class=""></i> </a>
		          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
		        </ul>
		        <div class="clearfix"></div>
		      </div>

		      <div class="x_content">
	          <table id="datatable" class="table table-striped table-bordered jambo_table">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Cedula</th>
                  <th>Sección</th>
                  <th>Periodo</th>
                  {{-- <th style="width: 40px;" class="text-center"></th> --}}
                </tr>
              </thead>
              <tbody>
              	@foreach($alumnos as $alumno)
                  <tr>
                    <td>{{ $alumno->nombre." ".$alumno->nombre2 }}</td>
                    <td>{{ $alumno->apellido." ".$alumno->apellido2 }}</td>
                  	<td>{{ $alumno->cedula }}</td>
                    <td>{{ $alumno->inscripciones->last()->seccion->nombre }}</td>
                  	<td>{{ $alumno->inscripciones->last()->seccion->periodo->nombre }}</td>
                  </tr>
              	@endforeach
              </tbody>
	          </table>
		      </div>
		    </div>
		  </div>
		</div> {{-- CIERRE INSCRIPCIONES --}}

	</div>

	
@endsection