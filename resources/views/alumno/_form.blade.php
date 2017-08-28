<div class="row"> {{-- INFORMACION DEL ALUMNO --}}
  <div class="col-md-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2> Datos del Alumno </h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class=""><i class=""></i> </a>
          <li><a class=""><i class=""></i> </a>
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
      </div>

      <div class="x_content" >
        <div class="form-group">
          <label for="nombrePadre" class="control-label col-md-3 col-sm-3 col-xs-12">Primer nombre: </label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <input type="text" name="nombreAlumno" class="form-control" placeholder="Primer nombre" value="{{ $alumno->nombre or old('nombreAlumno') }}" {{ $disabled }}>
            @if ($errors->has('nombreAlumno'))
              <span style="color: red;">{{ $errors->first('nombreAlumno') }}</span>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="nombre2" class="control-label col-md-3 col-sm-3 col-xs-12">Segundo nombre: </label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <input type="text" name="nombre2Alumno" class="form-control" placeholder="Segundo nombre" value="{{ $alumno->nombre2 or old('nombre2Alumno') }}" {{ $disabled }}>
            @if ($errors->has('nombre2Alumno'))
              <span style="color: red;">{{ $errors->first('nombre2Alumno') }}</span>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="apellidoAlumno" class="control-label col-md-3 col-sm-3 col-xs-12">Primer apellido: </label>
          <div class="col-md-9 col-ksm-9 col-xs-12">
            <input type="text" class="form-control" name="apellidoAlumno" placeholder="Primer apellido" value="{{ $alumno->apellido or old('apellidoAlumno') }}" {{ $disabled }}>
            @if ($errors->has('apellidoAlumno'))
              <span style="color: red;">{{ $errors->first('apellidoAlumno') }}</span>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="apellido2Alumno" class="control-label col-md-3 col-sm-3 col-xs-12">Segundo apellido: </label>
          <div class="col-md-9 col-ksm-9 col-xs-12">
            <input type="text" class="form-control" name="apellido2Alumno" placeholder="Segundo apellido" value="{{ $alumno->apellido2 or old('apellido2Alumno') }}" {{ $disabled }}>
            @if ($errors->has('apellido2Alumno'))
              <span style="color: red;">{{ $errors->first('apellido2Alumno') }}</span>
            @endif
          </div>
        </div>

        <div class="form-group">
          <label for="cedulaAlumno" class="control-label col-md-3 col-sm-3 col-xs-12"> <span class="required">*</span> Cedula:
          </label>
          <div class="col-md-9 col-ksm-9 col-xs-12">
            <input type="text" class="form-control" name="cedulaAlumno" placeholder="Cedula (sera generada por el sistema)" value="{{ $alumno->cedula or old('cedulaAlumno') }}" disabled="">
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
            <input type="text" class="form-control" name="lugarNacimientoAlumno" placeholder="Lugar nacimiento" value="{{ $alumno->lugar_nacimiento or old('lugarNacimientoAlumno') }}" {{ $disabled }}>
            @if ($errors->has('lugarNacimientoAlumno'))
              <span style="color: red;">{{ $errors->first('lugarNacimientoAlumno') }}</span>
            @endif
          </div>
        </div>

        <div class="form-group">
          <label for="fechaNacimientoAlumno" class="control-label col-md-3 col-sm-3 col-xs-12"> <span class="required">*</span>
            Fecha nacimiento:
          </label>

          <div class="col-md-9 col-sm-9 col-xs-12 col-lg-6">
            <input type="text" name="fechaNacimientoAlumno" class="form-control has-feedback-left" id="fecha_nacimiento" placeholder="Fecha de nacimiento" aria-describedby="inputSuccess2Status"  value="{{ $alumno->fecha_nacimiento or old('fechaNacimientoAlumno') }}" {{ $disabled }}>
            <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
            @if ($errors->has('fechaNacimientoAlumno'))
                <span class="text-danger">{{ $errors->first('fechaNacimientoAlumno') }}</span>
            @endif
          </div>

        </div>

        <div class="form-group">
          <label for="direccionAlumno" class="control-label col-md-3 col-sm-3 col-xs-12"> <span class="required">*</span>
            Dirección:
          </label>
          <div class="col-md-9 col-ksm-9 col-xs-12">
            <input type="text" class="form-control" name="direccionAlumno" placeholder="Dirección" value="{{ $alumno->direccion or old('direccionAlumno') }}" {{ $disabled }}>
            @if ($errors->has('direccionAlumno'))
              <span style="color: red;">{{ $errors->first('direccionAlumno') }}</span>
            @endif
          </div>
        </div>

      </div>
    </div>
  </div>
</div> {{-- CIERRE INFORMACIÓN DEL ALUMNO --}}