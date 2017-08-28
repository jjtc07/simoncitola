@extends('layouts.base')

@section('css')
  <link href={{ URL::asset('css/daterangepicker.css') }} rel="stylesheet">
@endsection

@section('contenido')

	<div class="clearfix"></div>
	<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 text-center">
      <h1 class="">Editar Empleado</h1>
    </div>
	</div>

  <form class="form-horizontal form-label-left" action="{{ route('empleados.update', $empleado->id ) }}" method="POST">

   	{{ method_field('PUT') }} 

		@include('empleado._form',['empleado', $empleado])

	  {{ csrf_field() }}
	</form>

@endsection

@section('js')
	<script src={{ URL::asset('js/moment.min.js') }}></script>
	<script src={{ URL::asset('js/daterangepicker.js') }}></script>
	<script src={{ URL::asset('js/empleado/create.js') }}></script>
@stop