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
        {{-- INFORMACION DEL ALUMNO --}}
        <div class="row">
          <div class="col-md-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2> Datos del alumno alumno </h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class=""><i class=""></i> </a>
                  <li><a class=""><i class=""></i> </a>
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
              </div>

              {{-- <div class="x_content" style="display:none"> --}}
              <div class="x_content">
                <div class="form-group">
                  <label for="nombrePadre" class="control-label col-md-3 col-sm-3 col-xs-12">Primer nombre: </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" name="nombreAlumno" class="form-control" placeholder="Primer nombre" value="{{ $alumno->nombre or old('nombreAlumno') }}">
                    @if ($errors->has('nombreAlumno'))
                      <span style="color: red;">{{ $errors->first('nombreAlumno') }}</span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <label for="nombre2" class="control-label col-md-3 col-sm-3 col-xs-12">Segundo nombre: </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" name="nombre2Alumno" class="form-control" placeholder="Segundo nombre" value="{{ $alumno->nombre or old('nombre2Alumno') }}">
                    @if ($errors->has('nombre2Alumno'))
                      <span style="color: red;">{{ $errors->first('nombre2Alumno') }}</span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <label for="apellidoAlumno" class="control-label col-md-3 col-sm-3 col-xs-12">Primer apellido: </label>
                  <div class="col-md-9 col-ksm-9 col-xs-12">
                    <input type="text" class="form-control" name="apellidoAlumno" placeholder="Primer apellido" value="{{ $alumno->apellido or old('apellidoAlumno') }}">
                    @if ($errors->has('apellidoAlumno'))
                      <span style="color: red;">{{ $errors->first('apellidoAlumno') }}</span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <label for="apellido2Alumno" class="control-label col-md-3 col-sm-3 col-xs-12">Segundo apellido: </label>
                  <div class="col-md-9 col-ksm-9 col-xs-12">
                    <input type="text" class="form-control" name="apellido2Alumno" placeholder="Segundo apellido" value="{{ $alumno->apellido2 or old('apellido2Alumno') }}">
                    @if ($errors->has('apellido2Alumno'))
                      <span style="color: red;">{{ $errors->first('apellido2Alumno') }}</span>
                    @endif
                  </div>
                </div>

                <div class="form-group">
                  <label for="cedulaAlumno" class="control-label col-md-3 col-sm-3 col-xs-12"> <span class="required">*</span> Cedula:
                  </label>
                  <div class="col-md-9 col-ksm-9 col-xs-12">
                    <input type="text" class="form-control" name="cedulaAlumno" placeholder="Cedula" value="{{ $alumno->cedula or old('cedulaAlumno') }}">
                    @if ($errors->has('cedulaAlumno'))
                      <span style="color: red;">{{ $errors->first('cedulaAlumno') }}</span>
                    @endif
                  </div>
                </div>

                <div class="form-group">
                  <label for="lugarNacimientoAlumno" class="control-label col-md-3 col-sm-3 col-xs-12">
                    Lugar de nacimiento:
                  </label>
                  <div class="col-md-9 col-ksm-9 col-xs-12">
                    <input type="text" class="form-control" name="lugarNacimientoAlumno" placeholder="Lugar nacimiento" value="{{ $alumno->lugar_nacimiento or old('lugarNacimientoAlumno') }}">
                    @if ($errors->has('lugarNacimientoAlumno'))
                      <span style="color: red;">{{ $errors->first('lugarNacimientoAlumno') }}</span>
                    @endif
                  </div>
                </div>

                <div class="form-group">
                  <label for="fechaNacimientoAlumno" class="control-label col-md-3 col-sm-3 col-xs-12"> <span class="required">*</span>
                    Fecha nacimiento:
                  </label>
                  <div class="col-md-9 col-ksm-9 col-xs-12">
                    <input type="text" class="form-control" name="fechaNacimientoAlumno" placeholder="dd/mm/yyyy" value="{{ $alumno->fecha_nacimiento or old('fechaNacimientoAlumno') }}">
                    @if ($errors->has('fechaNacimientoAlumno'))
                      <span style="color: red;">{{ $errors->first('fechaNacimientoAlumno') }}</span>
                    @endif
                  </div>
                </div>

                <div class="form-group">
                  <label for="direccionAlumno" class="control-label col-md-3 col-sm-3 col-xs-12"> <span class="required">*</span>
                    Dirección:
                  </label>
                  <div class="col-md-9 col-ksm-9 col-xs-12">
                    <input type="text" class="form-control" name="direccionAlumno" placeholder="dd/mm/yyyy" value="{{ $alumno->direccion or old('direccionAlumno') }}">
                    @if ($errors->has('direccionAlumno'))
                      <span style="color: red;">{{ $errors->first('direccionAlumno') }}</span>
                    @endif
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div> {{-- CIERRE INFORMACIÓN DEL ALUMNO --}}

        {{-- DOCUMENTOS PRESENTADOS --}}
        <div class="row">
          <div class="col-md-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2> Datos presentados </h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class=""><i class=""></i> </a>
                  <li><a class=""><i class=""></i> </a>
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
              </div>

              <div class="x_content" >
                <div class="form-group">
                  <label for="responsable" class="control-label col-md-7 col-sm-7 col-xs-12">Sección: </label>
                  <div class="col-md-5 col-sm-5 col-xs-12">
                    <select name="seccion" class="form-control">
                      <option value=""> - Secciones - </option>
                      @foreach ($secciones as $seccion)
                        <option value="{{ $seccion->id }}">{{ $seccion->nombre }}</option>
                      @endforeach
                    </select>
                    @if ($errors->has('seccion'))
                      <span style="color: red;">{{ $errors->first('seccion') }}</span>
                    @endif
                  </div>
                </div>

                <div class="form-group">
                  <label for="responsable" class="control-label col-md-7 col-sm-7 col-xs-12">Responsable: </label>
                  <div class="">
                    Madre <input type="radio" name="responsable" value="0" checked> &nbsp;
                    Padre <input type="radio" name="responsable" value="1"> &nbsp;
                    Otro <input type="radio" name="responsable" value="2">
                  </div>
                </div>

                <div class="form-group">
                  <label for="partidaNacimiento" class="control-label col-md-7 col-sm-7 col-xs-12">Partida de nacimiento: </label>
                  <div class="">
                    Si <input type="radio" name="partidaNacimiento" value="1" > &nbsp;
                    no <input type="radio" name="partidaNacimiento" value="0" checked>
                  </div>
                </div>

                <div class="form-group">
                  <label for="certificadoVacunas" class="control-label col-md-7 col-sm-7 col-xs-12">Certificado de vacunas: </label>
                  <div class="">
                    Si <input type="radio" name="certificadoVacunas" value="1" > &nbsp;
                    no <input type="radio" name="certificadoVacunas" value="0" checked>
                  </div>
                </div>

                <div class="form-group">
                  <label for="fotos" class="control-label col-md-7 col-sm-7 col-xs-12">Fotos: </label>
                  <div class="">
                    Si <input type="radio" name="fotos" value="1"> &nbsp;
                    no <input type="radio" name="fotos" value="0" checked>
                  </div>
                </div>

                <div class="form-group">
                  <label for="copiaCedulaMadre" class="control-label col-md-7 col-sm-7 col-xs-12">Copia cedula de la madre: </label>
                  <div class="">
                    Si <input type="radio" name="copiaCedulaMadre" value="1"> &nbsp;
                    no <input type="radio" name="copiaCedulaMadre" value="0" checked>
                  </div>
                </div>

                <div class="form-group">
                  <label for="cartaResidencia" class="control-label col-md-7 col-sm-7 col-xs-12">Constancia de trabajo: </label>
                  <div class="">
                    Si <input type="radio" name="constanciaTrabajo" value="1"> &nbsp;
                    no <input type="radio" name="constanciaTrabajo" value="0" checked>
                  </div>
                </div>

                <div class="form-group">
                  <label for="nombre" class="control-label col-md-7 col-sm-7 col-xs-12">Carta de residencia: </label>
                  <div class="">
                    Si <input type="radio" name="cartaResidencia" value="1"> &nbsp;
                    no <input type="radio" name="cartaResidencia" value="0" checked>
                  </div>
                </div>

                <div class="form-group">
                  <label for="otrosNininos" class="control-label col-md-7 col-sm-7col-xs-12">¿Otros niños en la institución?: </label>
                  <div class="">
                    Si <input type="radio" name="otrosNininos" value="1"> &nbsp;
                    no <input type="radio" name="otrosNininos" value="0" checked>
                  </div>
                </div>

                <div class="form-group">
                  <label for="colabora" class="control-label col-md-7 col-sm-7 col-xs-12">¿Esta dispuesto a colaborar con la institución?: </label>
                  <div class="">
                    Si <input type="radio" name="colabora" value="1"> &nbsp;
                    no <input type="radio" name="colabora" value="0" checked>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div> {{-- CIERRE ROW DATOS PERSENTADOS --}}
      </div> {{-- CIERRE ROW DONDE ESTA EL ALUMNO Y LOS DOCUMENTOS PRESENTADOS --}}


      {{--  DATOS DEL PADRE, MADRE Y RESPONSABLE --}}
      <div class="col-md-6 col-xs-12">
        <div class="row">
          {{--  DATOS DEL PADRE --}}
          <div class="col-md-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Datos del padre </h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class=""><i class=""></i> </a>
                  <li><a class=""><i class=""></i> </a>
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
              </div>

              {{-- <div class="x_content" style="display:none"> --}}
              <div class="x_content">
            	  <div class="form-group">
            	    <label for="nombrePadre" class="control-label col-md-3 col-sm-3 col-xs-12">Primer nombre: </label>
            	    <div class="col-md-9 col-sm-9 col-xs-12">
            	      <input type="text" name="nombrePadre" class="form-control" placeholder="Primer nombre" value="{{ $padre->nombre or old('nombrePadre') }}">
                    @if ($errors->has('nombrePadre'))
                      <span style="color: red;">{{ $errors->first('nombrePadre') }}</span>
                    @endif
            	    </div>
            	  </div>
            	  <div class="form-group">
            	    <label for="nombre2Padre" class="control-label col-md-3 col-sm-3 col-xs-12">Segundo nombre: </label>
            	    <div class="col-md-9 col-sm-9 col-xs-12">
            	      <input type="text" name="nombre2Padre" class="form-control" placeholder="Segundo nombre" value="{{ $padre->nombre2 or old('nombre2Padre') }}">
                    @if ($errors->has('nombre2Padre'))
                      <span style="color: red;">{{ $errors->first('nombre2Padre') }}</span>
                    @endif
            	    </div>
            	  </div>
            	  <div class="form-group">
            	    <label for="apellidoPadre" class="control-label col-md-3 col-sm-3 col-xs-12">Primer apellido: </label>
            	    <div class="col-md-9 col-ksm-9 col-xs-12">
            	      <input type="text" class="form-control" name="apellidoPadre" placeholder="Primer apellido" value="{{ $padre->apellido or old('apellidoPadre') }}">
                    @if ($errors->has('apellidoPadre'))
                      <span style="color: red;">{{ $errors->first('apellidoPadre') }}</span>
                    @endif
            	    </div>
            	  </div>
            	  <div class="form-group">
            	    <label for="apellido2Padre" class="control-label col-md-3 col-sm-3 col-xs-12">Segundo apellido: </label>
            	    <div class="col-md-9 col-ksm-9 col-xs-12">
            	      <input type="text" class="form-control" name="apellido2Padre" placeholder="Segundo apellido" value="{{ $padre->apellido2 or old('apellido2Padre') }}">
                    @if ($errors->has('apellido2Padre'))
                      <span style="color: red;">{{ $errors->first('apellido2Padre') }}</span>
                    @endif
            	    </div>
            	  </div>

            	  <div class="form-group">
            	    <label for="cedulaPadre" class="control-label col-md-3 col-sm-3 col-xs-12"> <span class="required">*</span> Cedula:
            	    </label>
            	    <div class="col-md-9 col-ksm-9 col-xs-12">
            	      <input type="text" class="form-control" name="cedulaPadre" placeholder="Cedula" value="{{ $padre->cedula or old('cedulaPadre') }}">
                    @if ($errors->has('cedulaPadre'))
                      <span style="color: red;">{{ $errors->first('cedulaPadre') }}</span>
                    @endif
            	    </div>
            	  </div>

            	  <div class="form-group">
            	    <label for="fechaNacimientoPadre" class="control-label col-md-3 col-sm-3 col-xs-12"> <span class="required">*</span>
            	    	Fecha nacimiento:
            	    </label>
            	    <div class="col-md-9 col-ksm-9 col-xs-12">
            	      <input type="text" class="form-control" name="fechaNacimientoPadre" placeholder="dd/mm/yyyy" value="{{ $padre->fecha_nacimiento or old('fechaNacimientoPadre') }}">
                    @if ($errors->has('fechaNacimientoPadre'))
                      <span style="color: red;">{{ $errors->first('fechaNacimientoPadre') }}</span>
                    @endif
            	    </div>
            	  </div>

                <div class="form-group">
                  <label for="ocupacionPadre" class="control-label col-md-3 col-sm-3 col-xs-12">
                    Ocupación:
                  </label>
                  <div class="col-md-9 col-ksm-9 col-xs-12">
                    <input type="text" class="form-control" name="ocupacionPadre" placeholder="Ocupación" value="{{ $padre->ocupacion or old('ocupacionPadre') }}">
                    @if ($errors->has('ocupacionPadre'))
                      <span style="color: red;">{{ $errors->first('ocupacionPadre') }}</span>
                    @endif
                  </div>
                </div>

                <div class="form-group">
                  <label for="direccionTrabajoPadre" class="control-label col-md-3 col-sm-3 col-xs-12">
                    Dirección trabajo:
                  </label>
                  <div class="col-md-9 col-ksm-9 col-xs-12">
                    <input type="text" class="form-control" name="direccionTrabajoPadre" placeholder="Direccion del trabajo" value="{{ $padre->direccion_trabajo or old('direccionTrabajoPadre') }}">
                    @if ($errors->has('direccionTrabajoPadre'))
                      <span style="color: red;">{{ $errors->first('direccionTrabajoPadre') }}</span>
                    @endif
                  </div>
                </div>

                <div class="form-group">
                  <label for="telefonoPadre" class="control-label col-md-3 col-sm-3 col-xs-12">
                    Teléfono:
                  </label>
                  <div class="col-md-9 col-ksm-9 col-xs-12">
                    <input type="text" class="form-control" name="telefonoPadre" placeholder="Teléfono" value="{{ $padre->telefono or old('telefonoPadre') }}">
                    @if ($errors->has('telefonoPadre'))
                      <span style="color: red;">{{ $errors->first('telefonoPadre') }}</span>
                    @endif
                  </div>
                </div>

                <div class="form-group">
                  <label for="telefono2Padre" class="control-label col-md-3 col-sm-3 col-xs-12">
                    Teléfono 2:
                  </label>
                  <div class="col-md-9 col-ksm-9 col-xs-12">
                    <input type="text" class="form-control" name="telefono2Padre" placeholder="Otro teléfono" value="{{ $padre->telefono2 or old('telefono2Padre') }}">
                    @if ($errors->has('nombre2Padre'))
                      <span style="color: red;">{{ $errors->first('telefono2Padre') }}</span>
                    @endif
                  </div>
                </div>
      				</div>
            </div>
          </div> {{-- CIERRE INFORMACIÓN DEL PADRE --}}

          {{-- INFORMACION DE LA MADRE  --}}
          <div class="col-md-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Datos de la Madre </h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class=""><i class=""></i> </a>
                  <li><a class=""><i class=""></i> </a>
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
              </div>

              {{-- <div class="x_content" style="display:none"> --}}
              <div class="x_content">
            	  <div class="form-group">
            	    <label for="nombreMadre" class="control-label col-md-3 col-sm-3 col-xs-12">Primer nombre: </label>
            	    <div class="col-md-9 col-sm-9 col-xs-12">
            	      <input type="text" name="nombreMadre" class="form-control" placeholder="Primer nombre" value="{{ $madre->nombre or old('nombreMadre') }}">
                    @if ($errors->has('nombreMadre'))
                      <span style="color: red;">{{ $errors->first('nombreMadre') }}</span>
                    @endif
            	    </div>
            	  </div>
            	  <div class="form-group">
            	    <label for="nombre2Madre" class="control-label col-md-3 col-sm-3 col-xs-12">Segundo nombre: </label>
            	    <div class="col-md-9 col-sm-9 col-xs-12">
            	      <input type="text" name="nombre2Madre" class="form-control" placeholder="Segundo nombre" value="{{ $madre->nombre2 or old('nombre2Madre') }}">
                    @if ($errors->has('nombre2Madre'))
                      <span style="color: red;">{{ $errors->first('nombre2Madre') }}</span>
                    @endif
            	    </div>
            	  </div>
            	  <div class="form-group">
            	    <label for="apellidoMadre" class="control-label col-md-3 col-sm-3 col-xs-12">Primer apellido: </label>
            	    <div class="col-md-9 col-ksm-9 col-xs-12">
            	      <input type="text" class="form-control" name="apellidoMadre" placeholder="Primer apellido" value="{{ $madre->apellido or old('apellidoMadre') }}">
                    @if ($errors->has('apellidoMadre'))
                      <span style="color: red;">{{ $errors->first('apellidoMadre') }}</span>
                    @endif
            	    </div>
            	  </div>
            	  <div class="form-group">
            	    <label for="apellido2Madre" class="control-label col-md-3 col-sm-3 col-xs-12">Segundo apellido: </label>
            	    <div class="col-md-9 col-ksm-9 col-xs-12">
            	      <input type="text" class="form-control" name="apellido2Madre" placeholder="Segundo apellido" value="{{ $madre->apellido2 or old('apellido2Madre') }}">
                    @if ($errors->has('apellido2Madre'))
                      <span style="color: red;">{{ $errors->first('apellido2Madre') }}</span>
                    @endif
            	    </div>
            	  </div>

            	  <div class="form-group">
            	    <label for="cedulaMadre" class="control-label col-md-3 col-sm-3 col-xs-12"> <span class="required">*</span> Cedula:
            	    </label>
            	    <div class="col-md-9 col-ksm-9 col-xs-12">
            	      <input type="text" class="form-control" name="cedulaMadre" placeholder="Cedula" value="{{ $madre->cedula or old('cedulaMadre') }}">
                    @if ($errors->has('cedulaMadre'))
                      <span style="color: red;">{{ $errors->first('cedulaMadre') }}</span>
                    @endif
            	    </div>
            	  </div>

            	  <div class="form-group">
            	    <label for="fechaNacimientoMadre" class="control-label col-md-3 col-sm-3 col-xs-12"> <span class="required">*</span>
            	    	Fecha nacimiento:
            	    </label>
            	    <div class="col-md-9 col-ksm-9 col-xs-12">
            	      <input type="text" class="form-control" name="fechaNacimientoMadre" placeholder="dd/mm/yyyy" value="{{ $madre->fecha_nacimiento or old('fechaNacimientoMadre') }}">
                    @if ($errors->has('fechaNacimientoMadre'))
                      <span style="color: red;">{{ $errors->first('fechaNacimientoMadre') }}</span>
                    @endif
            	    </div>
            	  </div>

                <div class="form-group">
                  <label for="ocupacionMadre" class="control-label col-md-3 col-sm-3 col-xs-12">
                    Ocupación:
                  </label>
                  <div class="col-md-9 col-ksm-9 col-xs-12">
                    <input type="text" class="form-control" name="ocupacionMadre" placeholder="Ocupación" value="{{ $madre->ocupacion or old('ocupacionMadre') }}">
                    @if ($errors->has('ocupacionMadre'))
                      <span style="color: red;">{{ $errors->first('ocupacionMadre') }}</span>
                    @endif
                  </div>
                </div>

                <div class="form-group">
                  <label for="direccionTrabajoMadre" class="control-label col-md-3 col-sm-3 col-xs-12">
                    Dirección trabajo:
                  </label>
                  <div class="col-md-9 col-ksm-9 col-xs-12">
                    <input type="text" class="form-control" name="direccionTrabajoMadre" placeholder="Direccion del trabajo" value="{{ $madre->direccion_trabajo or old('direccionTrabajoMadre') }}">
                    @if ($errors->has('direccionTrabajoMadre'))
                      <span style="color: red;">{{ $errors->first('direccionTrabajoMadre') }}</span>
                    @endif
                  </div>
                </div>

                <div class="form-group">
                  <label for="telefonoMadre" class="control-label col-md-3 col-sm-3 col-xs-12">
                    Teléfono:
                  </label>
                  <div class="col-md-9 col-ksm-9 col-xs-12">
                    <input type="text" class="form-control" name="telefonoMadre" placeholder="Teléfono" value="{{ $madre->telefono or old('telefonoMadre') }}">
                    @if ($errors->has('telefonoMadre'))
                      <span style="color: red;">{{ $errors->first('telefonoMadre') }}</span>
                    @endif
                  </div>
                </div>

                <div class="form-group">
                  <label for="telefono2Madre" class="control-label col-md-3 col-sm-3 col-xs-12">
                    Teléfono 2:
                  </label>
                  <div class="col-md-9 col-ksm-9 col-xs-12">
                    <input type="text" class="form-control" name="telefono2Madre" placeholder="Otro teléfono" value="{{ $madre->telefono2 or old('telefono2Madre') }}">
                    @if ($errors->has('telefono2Madre'))
                      <span style="color: red;">{{ $errors->first('telefono2Madre') }}</span>
                    @endif
                  </div>
                </div>
      				</div>
            </div>
          </div> {{-- CIERRE INFORMACIÓN DE LA MADRE --}}

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
