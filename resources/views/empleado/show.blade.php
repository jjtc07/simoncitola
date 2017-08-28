@extends('layouts.base')

@section('css')
  <link href={{ URL::asset('css/daterangepicker.css') }} rel="stylesheet">
@endsection

@section('contenido')

	<div class="clearfix"></div>
	<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 text-center">
      <h1 class="">Nuevo Empleado</h1>
    </div>
	</div>

  <div class="form-horizontal form-label-left" >

		@include('empleado._form',['empleado', $empleado])

	</div>

@endsection

@section('js')
	<script src={{ URL::asset('js/moment.min.js') }}></script>
	<script src={{ URL::asset('js/daterangepicker.js') }}></script>
	<script src={{ URL::asset('js/empleado/create.js') }}></script>
@stop