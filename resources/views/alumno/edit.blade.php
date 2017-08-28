@extends('layouts.base')

@section('css')
  <link href={{ URL::asset('css/daterangepicker.css') }} rel="stylesheet">
@endsection

@section('contenido')
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12 text-center">
			<h1 class="">Editar Alumno</h1>
		</div>
	</div>

  <form id="form-alumno" class="form-horizontal form-label-left" action="{{ route('alumnos.update', $alumno->id ) }}" method="POST">

   	{{ method_field('PUT') }} 
  
		@include('alumno._form', ['alumno' => $alumno, 'disabled' => $disabled])

		<div class="form-group">
			<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 text-center">
				<a href="{{ route('alumnos.index') }}" class="btn btn-danger">Cancelar</a>
				<button class="btn btn-success" type="submit">Guardar</button>
			</div>
		</div>
		{{ csrf_field() }}
	</form>

@endsection

@section('js')
	<script src={{ URL::asset('js/moment.min.js') }}></script>
	<script src={{ URL::asset('js/daterangepicker.js') }}></script>
	<script src={{ URL::asset('js/alumno/create.js') }}></script>
@stop