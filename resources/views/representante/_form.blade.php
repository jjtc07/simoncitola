<div class="row">
  {{--  DATOS DEL PADRE O REPRESENTANTE --}}
  <div class="col-md-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Datos {{ ($tipo != '')? $tipo:'representante' }} </h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class=""><i class=""></i> </a></li>
          <li><a class=""><i class=""></i> </a></li>
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
      </div>

      <div class="x_content">
        <div class="form-group">
          <label for="cedula{{ $tipo }}" class="control-label col-md-3 col-sm-3 col-xs-12"> <span class="required">*</span> Cedula:
          </label>
          <div class="col-md-9 col-sm-9 col-xs-12 ">
            <input type="text" class="form-control {{ $tipo }} " name="cedula{{ $tipo }}" id="cedula{{ $tipo }}" placeholder="Cedula" value="{{ $representante->cedula or old('cedula'.$tipo) }}" {{ $disabled }}>
            @if ($errors->has('cedula'.$tipo))
              <span style="color: red;">{{ $errors->first('cedula'.$tipo) }}</span>
            @endif
          </div>
        </div>

        <div class="form-group">
          <label for="nombre{{ $tipo }}" class="control-label col-md-3 col-sm-3 col-xs-12">Primer nombre: </label>
          <div class="col-md-9 col-sm-9 col-xs-12 ">
            <input type="text" name="nombre{{ $tipo }}" class="form-control {{ $tipo }}" placeholder="Primer nombre" value="{{ $representante->nombre or old('nombre'.$tipo) }}" {{ $disabled }}>
            @if ($errors->has('nombre'.$tipo))
              <span style="color: red;">{{ $errors->first('nombre'.$tipo) }}</span>
            @endif
          </div>
        </div>

        <div class="form-group">
          <label for="nombre2{{ $tipo }}" class="control-label col-md-3 col-sm-3 col-xs-12 ">Segundo nombre: </label>
          <div class="col-md-9 col-sm-9 col-xs-12 ">
            <input type="text" name="nombre2{{ $tipo }}" class="form-control {{ $tipo }}" placeholder="Segundo nombre" value="{{ $representante->nombre2 or old('nombre2'.$tipo) }}" {{ $disabled }}>
            @if ($errors->has('nombre2'.$tipo))
              <span style="color: red;">{{ $errors->first('nombre2'.$tipo) }}</span>
            @endif
          </div>
        </div>

        <div class="form-group">
          <label for="apellido{{ $tipo }}" class="control-label col-md-3 col-sm-3 col-xs-12 ">Primer apellido: </label>
          <div class="col-md-9 col-sm-9 col-xs-12 ">
            <input type="text" class="form-control {{ $tipo }}" name="apellido{{ $tipo }}" placeholder="Primer apellido" value="{{ $representante->apellido or old('apellido'.$tipo) }}" {{ $disabled }}>
            @if ($errors->has('apellido'.$tipo))
              <span style="color: red;">{{ $errors->first('apellido'.$tipo) }}</span>
            @endif
          </div>
        </div>

        <div class="form-group">
          <label for="apellido2{{ $tipo }}" class="control-label col-md-3 col-sm-3 col-xs-12 ">Segundo apellido: </label>
          <div class="col-md-9 col-sm-9 col-xs-12 ">
            <input type="text" class="form-control {{ $tipo }}" name="apellido2{{ $tipo }}" placeholder="Segundo apellido" value="{{ $representante->apellido2 or old('apellido2'.$tipo) }}" {{ $disabled }}>
            @if ($errors->has('apellido2'.$tipo))
              <span style="color: red;">{{ $errors->first('apellido2'.$tipo) }}</span>
            @endif
          </div>
        </div>

        <div class="form-group">
          <label for="fechaNacimiento{{ $tipo }}" class="control-label col-md-3 col-sm-3 col-xs-12 "> <span class="required">*</span>
            Fecha nacimiento:
          </label>

          <div class="col-md-9 col-sm-9 col-xs-12 ">
            <input type="text" name="fecha_nacimiento{{ $tipo }}" class="form-control has-feedback-left {{ $tipo }}" id="fecha_nacimiento{{ $tipo }}" placeholder="Fecha de nacimiento" aria-describedby="inputSuccess2Status"  value="{{ $representante->fecha_nacimiento or old('fecha_nacimiento'.$tipo) }}" {{ $disabled }}>
            <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
            @if ($errors->has('fecha_nacimiento'.$tipo))
                <span style="color: red;">{{ $errors->first('fecha_nacimiento'.$tipo) }}</span>
            @endif
          </div>

        </div>

        <div class="form-group">
          <label for="ocupacion{{ $tipo }}" class="control-label col-md-3 col-sm-3 col-xs-12 ">
            Ocupación:
          </label>
          <div class="col-md-9 col-sm-9 col-xs-12 ">
            <input type="text" class="form-control {{ $tipo }}" name="ocupacion{{ $tipo }}" placeholder="Ocupación" value="{{ $representante->ocupacion or old('ocupacion'.$tipo) }}" {{ $disabled }}>
            @if ($errors->has('ocupacion'.$tipo))
              <span style="color: red;">{{ $errors->first('ocupacion'.$tipo) }}</span>
            @endif
          </div>
        </div>

        <div class="form-group">
          <label for="direccion_trabajo{{ $tipo }}" class="control-label col-md-3 col-sm-3 col-xs-12 ">
            Dirección trabajo:
          </label>
          <div class="col-md-9 col-sm-9 col-xs-12 ">
            <input type="text" class="form-control {{ $tipo }}" name="direccion_trabajo{{ $tipo }}" placeholder="Direccion del trabajo" value="{{ $representante->direccion_trabajo or old('direccion_trabajo'.$tipo) }}" {{ $disabled }}>
            @if ($errors->has('direccion_trabajo'.$tipo))
              <span style="color: red;">{{ $errors->first('direccion_trabajo'.$tipo) }}</span>
            @endif
          </div>
        </div>

        <div class="form-group">
          <label for="telefono{{ $tipo }}" class="control-label col-md-3 col-sm-3 col-xs-12 ">
            Teléfono:
          </label>
          <div class="col-md-9 col-sm-9 col-xs-12 ">
            <input type="text" class="form-control {{ $tipo }}" name="telefono{{ $tipo }}" placeholder="Teléfono" value="{{ $representante->telefono or old('telefono'.$tipo) }}" {{ $disabled }}>
            @if ($errors->has('telefono'.$tipo))
              <span style="color: red;">{{ $errors->first('telefono'.$tipo) }}</span>
            @endif
          </div>
        </div>

        <div class="form-group">
          <label for="telefono2{{ $tipo }}" class="control-label col-md-3 col-sm-3 col-xs-12">
            Teléfono 2:
          </label>
          <div class="col-md-9 col-sm-9 col-xs-12 ">
            <input type="text" class="form-control {{ $tipo }}" name="telefono2{{ $tipo }}" placeholder="Otro teléfono" value="{{ $representante->telefono2 or old('telefono2'.$tipo) }}" {{ $disabled }}>
            @if ($errors->has('nombre2'.$tipo))
              <span style="color: red;">{{ $errors->first('telefono2'.$tipo) }}</span>
            @endif
          </div>
        </div>
        
      </div>
    </div>
  </div> {{-- CIERRE INFORMACIÓN DEL  --}}
</div>