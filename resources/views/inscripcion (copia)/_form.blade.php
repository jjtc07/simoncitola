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
              <option value="0"> - Secciones - </option>
              @foreach ($secciones as $seccion)
                <option value="{{ $seccion->id }}" {{ ($inscripcion->seccion_id == $seccion->id)? 'selected':'' }}>{{ $seccion->nombre }}</option>
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
            Madre <input type="radio" name="responsable" value="0" {{ ($inscripcion->responsable_id == $inscripcion->alumno->madre_id)?'checked':'' }}> &nbsp;
            Padre <input type="radio" name="responsable" value="1" {{ ($inscripcion->responsable_id == $inscripcion->alumno->padre_id)?'checked':'' }}> &nbsp;
            Otro <input type="radio" name="responsable" value="2" {{ ($inscripcion->responsable_id != $inscripcion->alumno->madre_id and $inscripcion->responsable_id != $inscripcion->alumno->padre_id)?'checked':'' }} >
          </div>
        </div>

        <div class="form-group">
          <label for="partidaNacimiento" class="control-label col-md-7 col-sm-7 col-xs-12">Partida de nacimiento: </label>
          <div class="">
            Si <input type="radio" name="partidaNacimiento" value="1" {{ ($inscripcion->partida_nacimiento)?'checked':'' }}> &nbsp;
            no <input type="radio" name="partidaNacimiento" value="0" {{ (!$inscripcion->partida_nacimiento)?'checked':'' }}>
          </div>
        </div>

        <div class="form-group">
          <label for="certificadoVacunas" class="control-label col-md-7 col-sm-7 col-xs-12">Certificado de vacunas: </label>
          <div class="">
            Si <input type="radio" name="certificadoVacunas" value="1" {{ ($inscripcion->certificado_vacuna)?'checked':'' }}> &nbsp;
            no <input type="radio" name="certificadoVacunas" value="0" {{ (!$inscripcion->certificado_vacuna)?'checked':'' }}>
          </div>
        </div>

        <div class="form-group">
          <label for="fotos" class="control-label col-md-7 col-sm-7 col-xs-12">Fotos: </label>
          <div class="">
            Si <input type="radio" name="fotos" value="1" {{ ($inscripcion->foto)?'checked':'' }}> &nbsp;
            no <input type="radio" name="fotos" value="0" {{ (!$inscripcion->foto)?'checked':'' }}>
          </div>
        </div>

        <div class="form-group">
          <label for="copiaCedulaMadre" class="control-label col-md-7 col-sm-7 col-xs-12">Copia cedula de la madre: </label>
          <div class="">
            Si <input type="radio" name="copiaCedulaMadre" value="1" {{ ($inscripcion->copia_cedula_madre)?'checked':'' }}> &nbsp;
            no <input type="radio" name="copiaCedulaMadre" value="0" {{ (!$inscripcion->copia_cedula_madre)?'checked':'' }}>
          </div>
        </div>

        <div class="form-group">
          <label for="constanciaTrabajo" class="control-label col-md-7 col-sm-7 col-xs-12">Constancia de trabajo: </label>
          <div class="">
            Si <input type="radio" name="constanciaTrabajo" value="1" {{ ($inscripcion->constancia_trabajo)?'checked':'' }}> &nbsp;
            no <input type="radio" name="constanciaTrabajo" value="0" {{ (!$inscripcion->constancia_trabajo)?'checked':'' }}>
          </div>
        </div>

        <div class="form-group">
          <label for="cartaResidencia" class="control-label col-md-7 col-sm-7 col-xs-12">Carta de residencia: </label>
          <div class="">
            Si <input type="radio" name="cartaResidencia" value="1" {{ ($inscripcion->carta_residencia)?'checked':'' }}> &nbsp;
            no <input type="radio" name="cartaResidencia" value="0" {{ (!$inscripcion->carta_residencia)?'checked':'' }}>
          </div>
        </div>

        <div class="form-group">
          <label for="otrosNininos" class="control-label col-md-7 col-sm-7col-xs-12">¿Otros niños en la institución?: </label>
          <div class="">
            Si <input type="radio" name="otrosNininos" value="1" {{ ($inscripcion->otros_ninios_inscritos)?'checked':'' }}> &nbsp;
            no <input type="radio" name="otrosNininos" value="0" {{ (!$inscripcion->otros_ninios_inscritos)?'checked':'' }}>
          </div>
        </div>

        <div class="form-group">
          <label for="colabora" class="control-label col-md-7 col-sm-7 col-xs-12">¿Esta dispuesto a colaborar con la institución?: </label>
          <div class="">
            Si <input type="radio" name="colabora" value="1" {{ ($inscripcion->colabora)?'checked':'' }}> &nbsp;
            no <input type="radio" name="colabora" value="0" {{ (!$inscripcion->colabora)?'checked':'' }}>
          </div>
        </div>
        @if($inscripcion->exists)
        <div class="ln_solid"></div>
        <div class="form-group">
          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 text-center">
            <a href={{ route('inscripciones.index') }} class="btn btn-danger">Volver</a>
            <button class="btn btn-default" type="reset">Limpiar</button>
            <button class="btn btn-success" type="submit">Guardar</button>
          </div>
        </div>
        @endif

      </div>
    </div>
  </div>
</div> {{-- CIERRE ROW DATOS PERSENTADOS --}}