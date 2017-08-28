@extends('layouts.base')

@section('css')
  <link href={{ URL::asset('css/daterangepicker.css') }} rel="stylesheet">
@endsection

@section('contenido')

  <form id="form-alumno" class="form-horizontal form-label-left" action="{{ route('representantes.update', $representante->id ) }}" method="POST">

		{{ method_field('PUT') }}

		@include('representante._form', ['representante' => $representante, 'tipo' => ''])

		<div class="form-group">
			<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 text-center">
				<a href="{{ route('representantes.index') }}" class="btn btn-danger">Cancelar</a>
				<button class="btn btn-success" type="submit">Guardar</button>
			</div>
		</div>

		{{ csrf_field() }}

	</form>

@endsection

@section('js')
	<script src={{ URL::asset('js/moment.min.js') }}></script>
	<script src={{ URL::asset('js/daterangepicker.js') }}></script>
	<script src={{ URL::asset('js/representante/create.js') }}></script>
@stop