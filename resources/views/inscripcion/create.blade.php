@extends('layouts.base')

@section('contenido')
{{-- 
  @if(count($errors) > 0)
    @foreach($errors->all() as $error)
      <p>{{ $error }}</p>
    @endforeach
  @endif
--}}
  <div class="row">
    <form class="form-horizontal form-label-left" action="{{route('inscripciones.store')}}" method="POST" >
      {{-- INFORMACION DEL ALUMNO Y DOCUMENTOS PRESENTADOS --}}
      <div class="col-md-6 col-xs-12">

        {{-- FORM INFORMACION DEL ALUMNO --}}
        @include('alumno._form', ['alumno' => $alumno, 'disabled' => $disabled])

        {{-- FORM DOCUMENTOS PRESENTADOS --}}
        @include('inscripcion._form')

      </div> {{-- CIERRE ROW DONDE ESTA EL ALUMNO Y LOS DOCUMENTOS PRESENTADOS --}}


      {{--  DATOS DEL PADRE, MADRE Y RESPONSABLE --}}
      <div class="col-md-6 col-xs-12">
        <div class="row">
          @include('representante._form',['representante' => $madre, 'tipo' => 'Madre'])

          @include('representante._form',['representante' => $padre, 'tipo' => 'Padre'])

          <div id="div-representante" {{ (old('responsable') == '2')? "style=display:block" : "style = display:none "}} >
            @include('representante._form',['representante' => $responsable, 'tipo' => 'Responsable'])
          </div>
          
        </div>
      </div>

      <div class="col-md-12 col-xs-12">
        <div class="row">
        	<div class="col-md-12 col-sm-12 col-xs-12">
          	<div class="x_panel">
          		<div class="x_content">
        				<div class="ln_solid"></div>
        				<div class="form-group">
        					<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 text-center">
        						<a href="{{ route('inscripciones.index') }}" class="btn btn-danger">Volver</a>
        						<button class="btn btn-default" type="reset">Limpiar</button>
        						<button class="btn btn-success" type="submit">Guardar</button>
        					</div>
        				</div>
          		</div>
          	</div>
        	</div>
        </div>
      </div>

      {{ csrf_field() }}
    </form>

  </div> {{-- row de la pagina --}}


@endsection

@section('js')
  <script type="text/javascript"> var secciones = {!! $secciones !!}; </script>
  <script src={{ URL::asset('js/inscripcion/secciones.js') }}></script>
  <script src={{ URL::asset('js/inscripcion/create.js') }}></script>
@stop