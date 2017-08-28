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
          <label for="responsable" class="control-label col-lg-5 col-md-7 col-sm-7 col-xs-12">Sección: </label>
          <div class=" col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <select name="seccion" class="form-control" id="seccion">
              <option value="0"> - Secciones - </option>
              @foreach ($secciones as $seccion)
                <option value="{{ $seccion->id }}" {{ (  old('seccion') == $seccion->id or $inscripcion->seccion_id == $seccion->id)? 'selected':'' }}>{{ $seccion->nombre }}</option>
              @endforeach
            </select>
            <small class="text-danger" >cupos disponibles: <span id="cupos">0</span>  </small>
            @if ($errors->has('seccion'))
              <span style="color: red;">{{ $errors->first('seccion') }}</span>
            @endif
          </div>
        </div>

        <div class="form-group">
          <label for="responsable" class="control-label col-lg-5 col-md-7 col-sm-7 col-xs-12">Responsable: </label>
          <div class="">
          

          Madre <input type="radio" name="responsable" value="0" {{ (old('responsable') !='' )? ((old('responsable') =='0' )? 'checked':'' ) : ( ($inscripcion->exists)? ( ($inscripcion->responsable_id == $inscripcion->alumno->madre_id)?'checked':'' ) : 'checked' ) }} > &nbsp;
          Padre <input type="radio" name="responsable" value="1" {{ (old('responsable') !='' )? ((old('responsable') =='1' )? 'checked':'' ) : ( ($inscripcion->exists)? ( ($inscripcion->responsable_id == $inscripcion->alumno->padre_id)?'checked':'' ) : '' ) }}> &nbsp;
          Otro <input type="radio" name="responsable" value="2" {{ (old('responsable') !='' )? ((old('responsable') =='2' )? 'checked':'' ) : ( ($inscripcion->exists)? ( ($inscripcion->responsable_id != $inscripcion->alumno->madre_id and $inscripcion->responsable_id != $inscripcion->alumno->padre_id)?'checked':'' ) : '' ) }}>

{{-- 
            @if($inscripcion->exists)
              Madre <input type="radio" name="responsable" value="0" {{ ($inscripcion->responsable_id == $inscripcion->alumno->madre_id)?'checked':'' }}> &nbsp;
              Padre <input type="radio" name="responsable" value="1" {{ ($inscripcion->responsable_id == $inscripcion->alumno->padre_id)?'checked':'' }}> &nbsp;
              Otro <input type="radio" name="responsable" value="2" {{ ($inscripcion->responsable_id != $inscripcion->alumno->madre_id and $inscripcion->responsable_id != $inscripcion->alumno->padre_id)?'checked':'' }} >
            @else
              Madre <input type="radio" name="responsable" value="0" checked }}> &nbsp;
              Padre <input type="radio" name="responsable" value="1" > &nbsp;
              Otro <input type="radio" name="responsable" value="2" >
            @endif
 --}}

          </div>
        </div>

        <div class="form-group">
          <label for="partidaNacimiento" class="control-label col-lg-5 col-md-7 col-sm-7 col-xs-12">Partida de nacimiento: </label>
          <div class="">
            Si <input type="radio" name="partidaNacimiento" value="1" {{ ( old('partidaNacimiento') == '1' )? 'checked': ( ( ($inscripcion->exists)? ( ($inscripcion->partida_nacimiento)?'checked':'') : '') ) }}> &nbsp;
            no <input type="radio" name="partidaNacimiento" value="0" {{ ( old('partidaNacimiento') == '0' )? 'checked': (( (old('partidaNacimiento') == '1'))? '': ( ( ($inscripcion->exists)? ( (!$inscripcion->partida_nacimiento)?'checked':'') : 'checked') ) ) }}>
          </div>
        </div>

        <div class="form-group">
          <label for="certificadoVacunas" class="control-label col-lg-5 col-md-7 col-sm-7 col-xs-12">Certificado de vacunas: </label>
          <div class="">
            Si <input type="radio" name="certificadoVacunas" value="1" {{ ( old('certificadoVacunas') == '1' )? 'checked': ( ( ($inscripcion->exists)? ( ($inscripcion->certificado_vacuna)?'checked':'') : '') ) }}> &nbsp;

            no <input type="radio" name="certificadoVacunas" value="0" {{ ( old('certificadoVacunas') == '0' )? 'checked': (( (old('certificadoVacunas') == '1'))? '': ( ( ($inscripcion->exists)? ( (!$inscripcion->certificado_vacuna)?'checked':'') : 'checked') ) ) }}>
          </div>
        </div>

        <div class="form-group">
          <label for="foto" class="control-label col-lg-5 col-md-7 col-sm-7 col-xs-12">Fotos: </label>
          <div class="">
            Si <input type="radio" name="foto" value="1" {{ ( old('foto') == '1' )? 'checked': ( ( ($inscripcion->exists)? ( ($inscripcion->foto)?'checked':'') : '') ) }} > &nbsp;

            no <input type="radio" name="foto" value="0"{{ ( old('foto') == '0' )? 'checked': (( (old('foto') == '1'))? '': ( ( ($inscripcion->exists)? ( (!$inscripcion->foto)?'checked':'') : 'checked') ) ) }} >
          </div>
        </div>

        <div class="form-group">
          <label for="copiaCedulaMadre" class="control-label col-lg-5 col-md-7 col-sm-7 col-xs-12">Copia cedula de la madre: </label>
          <div class="">
            Si <input type="radio" name="copiaCedulaMadre" value="1" {{ ( old('copiaCedulaMadre') == '1' )? 'checked': ( ( ($inscripcion->exists)? ( ($inscripcion->copia_cedula_madre)?'checked':'') : '') ) }} > &nbsp;

            no <input type="radio" name="copiaCedulaMadre" value="0" {{ ( old('copiaCedulaMadre') == '0' )? 'checked': (( (old('copiaCedulaMadre') == '1'))? '': ( ( ($inscripcion->exists)? ( (!$inscripcion->copia_cedula_madre)?'checked':'') : 'checked') ) ) }}>
          </div>
        </div>

        <div class="form-group">
          <label for="constanciaTrabajo" class="control-label col-lg-5 col-md-7 col-sm-7 col-xs-12">Constancia de trabajo: </label>
          <div class="">
            Si <input type="radio" name="constanciaTrabajo" value="1" {{ ( old('constanciaTrabajo') == '1' )? 'checked': ( ( ($inscripcion->exists)? ( ($inscripcion->constancia_trabajo)?'checked':'') : '') ) }} > &nbsp;

            no <input type="radio" name="constanciaTrabajo" value="0" {{ ( old('constanciaTrabajo') == '0' )? 'checked': (( (old('constanciaTrabajo') == '1'))? '': ( ( ($inscripcion->exists)? ( (!$inscripcion->constancia_trabajo)?'checked':'') : 'checked') ) ) }}>
          </div>
        </div>

        <div class="form-group">
          <label for="cartaResidencia" class="control-label col-lg-5 col-md-7 col-sm-7 col-xs-12">Carta de residencia: </label>
          <div class="">
            Si <input type="radio" name="cartaResidencia" value="1" {{ ( old('cartaResidencia') == '1' )? 'checked': ( ( ($inscripcion->exists)? ( ($inscripcion->carta_residencia)?'checked':'') : '') ) }} > &nbsp;

            no <input type="radio" name="cartaResidencia" value="0" {{ ( old('cartaResidencia') == '0' )? 'checked': (( (old('cartaResidencia') == '1'))? '': ( ( ($inscripcion->exists)? ( (!$inscripcion->carta_residencia)?'checked':'') : 'checked') ) ) }}>
          </div>
        </div>

        <div class="form-group">
          <label for="otrosNininos" class="control-label col-lg-5 col-md-7 col-sm-7col-xs-12">¿Otros niños en la institución?: </label>
          <div class="">
            Si <input type="radio" name="otrosNininos" value="1" {{ ( old('otrosNininos') == '1' )? 'checked': ( ( ($inscripcion->exists)? ( ($inscripcion->otros_ninios_inscritos)?'checked':'') : '') ) }} > &nbsp;

            no <input type="radio" name="otrosNininos" value="0" {{ ( old('otrosNininos') == '0' )? 'checked': (( (old('otrosNininos') == '1'))? '': ( ( ($inscripcion->exists)? ( (!$inscripcion->otros_ninios_inscritos)?'checked':'') : 'checked') ) ) }}>
          </div>
        </div>

        <div class="form-group">
          <label for="colabora" class="control-label col-lg-5 col-md-7 col-sm-7 col-xs-12">¿Esta dispuesto a colaborar con la institución?: </label>
          <div class="">
            Si <input type="radio" name="colabora" value="1" {{ ( old('colabora') == '1' )? 'checked': ( ( ($inscripcion->exists)? ( ($inscripcion->colabora)?'checked':'') : '') ) }} > &nbsp;

            no <input type="radio" name="colabora" value="0" {{ ( old('colabora') == '0' )? 'checked': (( (old('colabora') == '1'))? '': ( ( ($inscripcion->exists)? ( (!$inscripcion->colabora)?'checked':'') : 'checked') ) ) }}>
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