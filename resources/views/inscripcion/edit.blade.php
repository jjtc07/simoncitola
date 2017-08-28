@extends('layouts.base')

@section('contenido')

		{{-- {{ dd($secciones) }} --}}
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 text-center">
				<h1 class="">Editar Inscripción</h1>
			</div>
		</div>
	    
    <form id="form-alumno" class="form-horizontal form-label-left" action="{{ route('inscripciones.update', $inscripcion->id ) }}" method="POST">

     	{{ method_field('PUT') }} 

	    {{-- @include('inscripcion._form', ['inscripcion' => $inscripcion]) --}}
	    @include('inscripcion._form')

			{{ csrf_field() }}
    </form>
@endsection

@section('js')
	<script type="text/javascript"> var secciones = {!! $secciones !!}; </script>
	<script src={{ URL::asset('js/inscripcion/secciones.js') }}></script>
@stop