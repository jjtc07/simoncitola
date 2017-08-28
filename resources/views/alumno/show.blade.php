@extends('layouts.base')

@section('contenido')
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12 text-center">
			<h1 class="">Mostrar Alumno</h1>
		</div>
	</div>

  <div class="form-horizontal form-label-left">
		@include('alumno._form', ['alumno' => $alumno, 'disabled' => $disabled])

		<div class="row"> {{-- INFORMACION DEL PADRES Y REPRESENTANTES --}}
		  <div class="col-md-12 col-xs-12">
		    <div class="x_panel">
		      <div class="x_title">
		        <h2> Padres y represetantes </h2>
		        <ul class="nav navbar-right panel_toolbox">
		          <li><a class=""><i class=""></i> </a>
		          <li><a class=""><i class=""></i> </a>
		          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
		        </ul>
		        <div class="clearfix"></div>
		      </div>

		      <div class="x_content" >

	      		<div class="form-group">
	      		  <label for="nombrePadre" class="control-label col-md-3 col-sm-3 col-xs-12">Representante: </label>
	      		  <div class="col-md-9 col-sm-9 col-xs-12">
	      		    <input type="text" class="form-control" value="{{ $alumno->inscripciones->last()->responsable->nombre." ".$alumno->inscripciones->last()->responsable->apellido }}" {{ $disabled }}>
	      		  </div>
	      		</div>

		        <div class="form-group">
		          <label for="nombrePadre" class="control-label col-md-3 col-sm-3 col-xs-12">Padre: </label>
		          <div class="col-md-9 col-sm-9 col-xs-12">
		            <input type="text" class="form-control" value="{{ $alumno->padre->nombre.' '.$alumno->padre->apellido }}" {{ $disabled }}>
		          </div>
		        </div>

		        <div class="form-group">
		          <label for="nombrePadre" class="control-label col-md-3 col-sm-3 col-xs-12">Madre: </label>
		          <div class="col-md-9 col-sm-9 col-xs-12">
		            <input type="text" class="form-control" value="{{ $alumno->madre->nombre.' '.$alumno->madre->apellido }}" {{ $disabled }}>
		          </div>
		        </div>

		      </div>
		    </div>
		  </div>
		</div> {{-- CIERRE INFORMACIÓN DEL ALUMNO --}}

		<div class="row"> {{-- INFORMACION DEL PADRES Y REPRESENTANTES --}}
		  <div class="col-md-12 col-xs-12">
		    <div class="x_panel">
		      <div class="x_title">
		        <h2> Inscripciones del Alumno </h2>
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
                  <th>Alumno</th>
                  <th>Representante</th>
                  <th>Sección</th>
                  <th>Periodo</th>
                  <th style="width: 40px;" class="text-center">
                    <a href={{ route('inscripciones.create') }} class="btn btn-success btn-xs" title="Crear">
                        <i class="fa fa-plus"></i>
                    </a>
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach($alumno->inscripciones as $inscripcion)
                <tr>
                  <td>{{ $inscripcion->alumno->nombre." ".$inscripcion->alumno->apellido }}</td>
                  <td>{{ $inscripcion->responsable->nombre." ".$inscripcion->responsable->apellido }}</td>
                  <td>{{ $inscripcion->seccion->nombre }}</td>
                  <td>{{ $inscripcion->seccion->periodo->nombre }}</td>
                  <td class="text-center">
                    <button type="button" class="btn btn-danger btn-xs" title="Eliminar" data-toggle="modal" data-target=".modal-eliminacion" onclick="$('#id-eliminar').val('{{ $inscripcion->id }}')">
                        <i class="fa fa-trash-o"></i>
                    </button>
                    <a href={{ route('inscripciones.edit', $inscripcion->id) }} class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-pencil"></i></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
	          </table>
		      </div>
		    </div>
		  </div>
		</div> {{-- CIERRE INSCRIPCIONES --}}

		<div class="row"> {{-- BOTONES --}}
		  <div class="col-md-12 col-xs-12">
		    <div class="x_panel">
		      
		      <div class="x_content">
	          <div class="ln_solid"></div>
	          <div class="form-group">
	          	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 text-center">
	          		<a href="{{ route('alumnos.index') }}" class="btn btn-danger">Volver</a>
	          	</div>
	          </div>
		      </div>
		    </div>
		  </div>
		</div> {{-- CIERRE INSCRIPCIONES --}}


	</div>

@endsection
