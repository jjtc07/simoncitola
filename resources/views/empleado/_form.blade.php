<div class="row">
  {{--  DATOS DEL EMPLEADO --}}
  <div class="col-md-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Datos del empleado. </h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class=""><i class=""></i> </a></li>
          <li><a class=""><i class=""></i> </a></li>
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
      </div>

      <div class="x_content">

        <div class="form-group">
          <label for="nombre" class="control-label col-md-3 col-sm-3 col-xs-12">Primer nombre: </label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <input type="text" name="nombre" class="form-control" placeholder="Primer nombre" value="{{ $empleado->nombre or old('nombre') }}" {{ $disabled }}>
            @if ($errors->has('nombre'))
              <span style="color: red;">{{ $errors->first('nombre') }}</span>
            @endif
          </div>
        </div>

        <div class="form-group">
          <label for="nombre2" class="control-label col-md-3 col-sm-3 col-xs-12">Segundo nombre: </label>
          <div class="col-md-39 col-sm-9 col-xs-12">
            <input type="text" name="nombre2" class="form-control" placeholder="Segundo nombre" value="{{ $empleado->nombre2 or old('nombre2') }}" {{ $disabled }}>
            @if ($errors->has('nombre2'))
              <span style="color: red;">{{ $errors->first('nombre2') }}</span>
            @endif
          </div>
        </div>

        <div class="form-group">
          <label for="apellido" class="control-label col-md-3 col-sm-3 col-xs-12">Primer apellido: </label>
          <div class="col-md-9 col-ksm-9 col-xs-12">
            <input type="text" class="form-control" name="apellido" placeholder="Primer apellido" value="{{ $empleado->apellido or old('apellido') }}" {{ $disabled }}>
            @if ($errors->has('apellido'))
              <span style="color: red;">{{ $errors->first('apellido') }}</span>
            @endif
          </div>
        </div>

        <div class="form-group">
          <label for="apellido2" class="control-label col-md-3 col-sm-3 col-xs-12">Segundo apellido: </label>
          <div class="col-md-9 col-ksm-9 col-xs-12">
            <input type="text" class="form-control" name="apellido2" placeholder="Segundo apellido" value="{{ $empleado->apellido2 or old('apellido2') }}" {{ $disabled }}>
            @if ($errors->has('apellido2'))
              <span style="color: red;">{{ $errors->first('apellido2') }}</span>
            @endif
          </div>
        </div>

        <div class="form-group">
          <label for="cedula" class="control-label col-md-3 col-sm-3 col-xs-12"> <span class="required">*</span> Cedula:
          </label>
          <div class="col-md-9 col-ksm-9 col-xs-12">
            <input type="text" class="form-control" name="cedula" placeholder="Cedula" value="{{ $empleado->cedula or old('cedula') }}" {{ $disabled }}>
            @if ($errors->has('cedula'))
              <span style="color: red;">{{ $errors->first('cedula') }}</span>
            @endif
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fecha_nacimiento"><span class="required">*</span> Fecha nacimiento:</label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" name="fecha_nacimiento" class="form-control has-feedback-left" id="fecha_nacimiento" placeholder="Inicio del periodo escolar" aria-describedby="inputSuccess2Status"  value="{{ $empleado->fecha_nacimiento or old('fecha_nacimiento') }}" {{ $disabled }}>
            <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
            @if ($errors->has('fecha_nacimiento'))
                <span class="text-danger">{{ $errors->first('fecha_nacimiento') }}</span>
            @endif
          </div>
        </div>

        <div class="form-group">
          <label for="cargo" class="control-label col-md-3 col-sm-3 col-xs-12">Cargo: </label>
          <div class="col-md-5 col-sm-5 col-xs-12">
            <select name="cargo" class="form-control" {{ $disabled }}>
              <option value=""> - Seleccione el cargo - </option>
              @foreach ($cargos as $cargo)
                <option value="{{ $cargo->id }}" {{ ($empleado->cargo_id == $cargo->id)? 'selected':'' }}>
                  {{ $cargo->nombre }}
                </option>
              @endforeach
            </select>
            @if ($errors->has('cargo'))
              <span style="color: red;">{{ $errors->first('cargo') }}</span>
            @endif
          </div>
        </div>

        <div class="form-group">
          <label for="funcion" class="control-label col-md-3 col-sm-3 col-xs-12">Funcion: </label>
          <div class="col-md-5 col-sm-5 col-xs-12">
            <select name="funcion" class="form-control" {{ $disabled }}>
              <option value=""> - Seleccione la función - </option>
              @foreach ($funciones as $funcion)
                <option value="{{ $funcion->id }}" {{ ($empleado->funcion_id == $funcion->id)? 'selected':'' }}>
                  {{ $funcion->nombre }}
                </option>
              @endforeach
            </select>
            @if ($errors->has('funcion'))
              <span style="color: red;">{{ $errors->first('funcion') }}</span>
            @endif
          </div>
        </div>

        <div class="form-group">
          <label for="direccion" class="control-label col-md-3 col-sm-3 col-xs-12">
            Dirección habitación:
          </label>
          <div class="col-md-9 col-ksm-9 col-xs-12">
            <input type="text" class="form-control" name="direccion" placeholder="Direccion habitación" value="{{ $empleado->direccion or old('direccion') }}" {{ $disabled }}>
            @if ($errors->has('direccion'))
              <span style="color: red;">{{ $errors->first('direccion') }}</span>
            @endif
          </div>
        </div>

        <div class="form-group">
          <label for="telefono" class="control-label col-md-3 col-sm-3 col-xs-12">
            Teléfono:
          </label>
          <div class="col-md-9 col-ksm-9 col-xs-12">
            <input type="text" class="form-control" name="telefono" placeholder="Teléfono" value="{{ $empleado->telefono or old('telefono') }}" {{ $disabled }}>
            @if ($errors->has('telefono'))
              <span style="color: red;">{{ $errors->first('telefono') }}</span>
            @endif
          </div>
        </div>

        <div class="form-group">
          <label for="telefono2" class="control-label col-md-3 col-sm-3 col-xs-12">
            Teléfono 2:
          </label>
          <div class="col-md-9 col-ksm-9 col-xs-12">
            <input type="text" class="form-control" name="telefono2" placeholder="Otro teléfono" value="{{ $empleado->telefono2 or old('telefono2') }}" {{ $disabled }}>
            @if ($errors->has('nombre2'))
              <span style="color: red;">{{ $errors->first('telefono2') }}</span>
            @endif
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fecha_inicio_institucion"><span class="required">*</span>Inicio en la institución:</label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" name="fecha_inicio_institucion" class="form-control has-feedback-left" id="fecha_inicio_institucion" placeholder="Fecha de inicio en la institución" aria-describedby="inputSuccess2Status"  value="{{ $empleado->fecha_inicio_institucion or old('fecha_inicio_institucion') }}" {{ $disabled }}>
            <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
            @if ($errors->has('fecha_inicio_institucion'))
                <span class="text-danger">{{ $errors->first('fecha_inicio_institucion') }}</span>
            @endif
          </div>
        </div>

        <div class="form-group">
          <label for="anios_servicio_nacional" class="control-label col-md-3 col-sm-3 col-xs-12">
            Años de servicio nacional:
          </label>
          <div class="col-md-9 col-ksm-9 col-xs-12">
            <input type="text" class="form-control" name="anios_servicio_nacional" placeholder="Años de servicios nacional" value="{{ $empleado->anios_servicio_nacional or old('anios_servicio_nacional') }}" {{ $disabled }}>
            @if ($errors->has('anios_servicio_nacional'))
              <span style="color: red;">{{ $errors->first('anios_servicio_nacional') }}</span>
            @endif
          </div>
        </div>

        <div class="form-group">
          <label for="anios_servicio_estadal" class="control-label col-md-3 col-sm-3 col-xs-12">
            Años servicio estadal:
          </label>
          <div class="col-md-9 col-ksm-9 col-xs-12">
            <input type="text" class="form-control" name="anios_servicio_estadal" placeholder="Años de servicio estatal" value="{{ $empleado->anios_servicio_estadal or old('anios_servicio_estadal') }}" {{ $disabled }}>
            @if ($errors->has('anios_servicio_estadal'))
              <span style="color: red;">{{ $errors->first('anios_servicio_estadal') }}</span>
            @endif
          </div>
        </div>

        <div class="form-group">
          <label for="anios_servicio_municipal" class="control-label col-md-3 col-sm-3 col-xs-12">
            Años servicio municipal:
          </label>
          <div class="col-md-9 col-ksm-9 col-xs-12">
            <input type="text" class="form-control" name="anios_servicio_municipal" placeholder="Años de servicios municipal" value="{{ $empleado->anios_servicio_municipal or old('anios_servicio_municipal') }}" {{ $disabled }}>
            @if ($errors->has('anios_servicio_municipal'))
              <span style="color: red;">{{ $errors->first('anios_servicio_municipal') }}</span>
            @endif
          </div>
        </div>

        <div class="form-group">
          <label for="anios_servicio_otros" class="control-label col-md-3 col-sm-3 col-xs-12">
            Años servicio otros:
          </label>
          <div class="col-md-9 col-ksm-9 col-xs-12">
            <input type="text" class="form-control" name="anios_servicio_otros" placeholder="Años de servicios en otros" value="{{ $empleado->anios_servicio_otros or old('anios_servicio_otros') }}" {{ $disabled }}>
            @if ($errors->has('anios_servicio_otros'))
              <span style="color: red;">{{ $errors->first('anio_sservicio_otros') }}</span>
            @endif
          </div>
        </div>

        <div class="form-group">
          <label for="titulo" class="control-label col-md-3 col-sm-3 col-xs-12">
            Titulo: 
          </label>
          <div class="col-md-9 col-ksm-9 col-xs-12">
            <input type="text" class="form-control" name="titulo" placeholder="Titulo de grado" value="{{ $empleado->titulo or old('titulo') }}" {{ $disabled }}>
            @if ($errors->has('titulo'))
              <span style="color: red;">{{ $errors->first('titulo') }}</span>
            @endif
          </div>
        </div>

        <div class="form-group">
          <label for="especialidad" class="control-label col-md-3 col-sm-3 col-xs-12">
            Especialidad:
          </label>
          <div class="col-md-9 col-ksm-9 col-xs-12">
            <input type="text" class="form-control" name="especialidad" placeholder="Especialidad" value="{{ $empleado->especialidad or old('especialidad') }}" {{ $disabled }}>
            @if ($errors->has('especialidad'))
              <span style="color: red;">{{ $errors->first('especialidad') }}</span>
            @endif
          </div>
        </div>

        <div class="form-group">
          <label for="codigo" class="control-label col-md-3 col-sm-3 col-xs-12">
            Código:
          </label>
          <div class="col-md-9 col-ksm-9 col-xs-12">
            <input type="text" class="form-control" name="codigo" placeholder="Código" value="{{ $empleado->codigo or old('codigo') }}" {{ $disabled }}>
            @if ($errors->has('codigo'))
              <span style="color: red;">{{ $errors->first('codigo') }}</span>
            @endif
          </div>
        </div>

        <div class="form-group">
          <label for="nivel_educativo" class="control-label col-md-3 col-sm-3 col-xs-12">
            Nivel Educativo: 
          </label>
          <div class="col-md-9 col-ksm-9 col-xs-12">
            <input type="text" class="form-control" name="nivel_educativo" placeholder="Nivel Educativo" value="{{ $empleado->nivel_educativo or old('nivel_educativo') }}" {{ $disabled }}>
            @if ($errors->has('nivel_educativo'))
              <span style="color: red;">{{ $errors->first('nivel_educativo') }}</span>
            @endif
          </div>
        </div>

        <div class="form-group">
          <label for="centro_operativo_labora" class="control-label col-md-3 col-sm-3 col-xs-12">
            Centro operativo labora:
          </label>
          <div class="col-md-9 col-ksm-9 col-xs-12">
            <input type="text" class="form-control" name="centro_operativo_labora" placeholder="Centro operativo labora" value="{{ $empleado->centro_operativo_labora or old('centro_operativo_labora') }}" {{ $disabled }}>
            @if ($errors->has('centro_operativo_labora'))
              <span style="color: red;">{{ $errors->first('centro_operativo_labora') }}</span>
            @endif
          </div>
        </div>

        <div class="form-group">
          <label for="numero_horas" class="control-label col-md-3 col-sm-3 col-xs-12">
            Número de Horas:
          </label>
          <div class="col-md-9 col-ksm-9 col-xs-12">
            <input type="text" class="form-control" name="numero_horas" placeholder="Número de Horas" value="{{ $empleado->numero_horas or old('numero_horas') }}" {{ $disabled }}>
            @if ($errors->has('numero_horas'))
              <span style="color: red;">{{ $errors->first('numero_horas') }}</span>
            @endif
          </div>
        </div>

        <div class="form-group">
          <label for="nivel_educativo_atiende" class="control-label col-md-3 col-sm-3 col-xs-12">
            Nivel Educativo que Atiende:
          </label>
          <div class="col-md-9 col-ksm-9 col-xs-12">
            <input type="text" class="form-control" name="nivel_educativo_atiende" placeholder="Nivel Educativo que Atiende" value="{{ $empleado->nivel_educativo_atiende or old('nivel_educativo_atiende') }}" {{ $disabled }}>
            @if ($errors->has('nivel_educativo_atiende'))
              <span style="color: red;">{{ $errors->first('nivel_educativo_atiende') }}</span>
            @endif
          </div>
        </div>

        <div class="form-group">
          <label for="sueldo_mensual" class="control-label col-md-3 col-sm-3 col-xs-12">
            Sueldo Mensual: 
          </label>
          <div class="col-md-9 col-ksm-9 col-xs-12">
            <input type="text" class="form-control" name="sueldo_mensual" placeholder="Seuldo mensual" value="{{ $empleado->sueldo_mensual or old('sueldo_mensual') }}" {{ $disabled }}>
            @if ($errors->has('sueldo_mensual'))
              <span style="color: red;">{{ $errors->first('sueldo_mensual') }}</span>
            @endif
          </div>
        </div>

        <div class="form-group">
          <label for="turno" class="control-label col-md-3 col-sm-3 col-xs-12">
            Turno:
          </label>
          <div class="col-md-9 col-ksm-9 col-xs-12">
            <input type="text" class="form-control" name="turno" placeholder="Turno en que trabaja" value="{{ $empleado->turno or old('turno') }}" {{ $disabled }}>
            @if ($errors->has('turno'))
              <span style="color: red;">{{ $errors->first('turno') }}</span>
            @endif
          </div>
        </div>

        <div class="form-group">
          <label for="estudia_actualmente" class="control-label col-md-3 col-sm-3 col-xs-12">
            ¿Estudia actualmente?: 
          </label>
          <div class="">
            Si <input type="radio" name="estudia_actualmente" value="1" {{ $disabled }} {{ ($empleado->estudia_actualmente)?'checked':'' }}> &nbsp;
            no <input type="radio" name="estudia_actualmente" value="0" {{ $disabled }} {{ (!$empleado->estudia_actualmente)?'checked':'' }}>
          </div>
        </div>

        <div class="form-group">
          <label for="descripcion_estudio" class="control-label col-md-3 col-sm-3 col-xs-12">
            Descripción de los estudios:
          </label>
          <div class="col-md-9 col-ksm-9 col-xs-12">
            <input type="text" class="form-control" name="descripcion_estudio" placeholder="Descripción de los estudios que realiza" value="{{ $empleado->descripcion_estudio or old('descripcion_estudio') }}" {{ $disabled }}>
            @if ($errors->has('descripcion_estudio'))
              <span style="color: red;">{{ $errors->first('descripcion_estudio') }}</span>
            @endif
          </div>
        </div>

        <div class="form-group">
          <label for="observacion" class="control-label col-md-3 col-sm-3 col-xs-12">
            Observación:
          </label>
          <div class="col-md-9 col-ksm-9 col-xs-12">
            <input type="text" class="form-control" name="observacion" placeholder="Observación" value="{{ $empleado->observacion or old('observacion') }}" {{ $disabled }}>
            @if ($errors->has('observacion'))
              <span style="color: red;">{{ $errors->first('observacion') }}</span>
            @endif
          </div>
        </div>

        <div class="form-group">
          <label for="copia_ultimo_recibo" class="control-label col-md-3 col-sm-3 col-xs-12">
            ¿Copia ultimo recibo?:
          </label>
          <div class="">
            Si <input type="radio" name="copia_ultimo_recibo" value="1" {{ $disabled }} {{ ($empleado->copia_ultimo_recibo)?'checked':'' }}> &nbsp;
            no <input type="radio" name="copia_ultimo_recibo" value="0" {{ $disabled }} {{ (!$empleado->copia_ultimo_recibo)?'checked':'' }} >
          </div>
        </div>

        <div class="form-group">
          <label for="copia_cedula" class="control-label col-md-3 col-sm-3 col-xs-12">
            ¿Copia cedula?: 
          </label>
          <div class="">
            Si <input type="radio" name="copia_cedula" value="1" {{ $disabled }} {{ ($empleado->copia_cedula)?'checked':'' }}> &nbsp;
            no <input type="radio" name="copia_cedula" value="0" {{ $disabled }} {{ (!$empleado->copia_cedula)?'checked':'' }}>
          </div>
        </div>

        <div class="ln_solid"></div>
        <div class="form-group">
          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 text-center">
            <a href={{ route('empleados.index') }} class="btn btn-danger">Volver</a>
            @if($disabled == '')
            <button class="btn btn-default" type="reset">Limpiar</button>
            <button class="btn btn-success" type="submit">Guardar</button>
            @endif
          </div>
        </div>

      </div>
    </div>
  </div> {{-- CIERRE INFORMACIÓN DEL EMPLEADO --}}
</div>