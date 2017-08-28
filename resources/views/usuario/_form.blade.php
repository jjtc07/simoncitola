<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
    	<div class="x_panel">
      		<div class="x_title">
        		<h2>Usuario</h2>
        		<ul class="nav navbar-right panel_toolbox">
					<li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        		</ul>
        		<div class="clearfix"></div>
      		</div>
      		<div class="x_content">
        		<br />
				<form id="form-usuario" class="form-horizontal form-label-left" action={{ route('usuarios.update',  $usuario->id) }} method="POST">
        		    {{ method_field('PUT') }}
    				{{ csrf_field() }}
    				<div class="form-group">
    					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre"> Nombre:</label>
    					<div class="col-md-6 col-sm-6 col-xs-12">
    						<input type="text" name="nombre" class="form-control col-md-7 col-xs-12" id="nombre" placeholder="Nombre del usuario" value="{{ $usuario->empleado->nombre or old('nombre') }}" readonly>
                            
    					</div>
    				</div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apellido"> Apellido:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="apellido" class="form-control col-md-7 col-xs-12" id="apellido" placeholder="Apellido del usuario" value="{{ $usuario->empleado->apellido or old('apellido') }}" readonly>
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cargo"> Cargo:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="cargo" class="form-control col-md-7 col-xs-12" id="cargo" placeholder="Cargo del usuario" value="{{ $usuario->empleado->cargo->nombre or old('cargo') }}" readonly>
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email"> Email:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="email" class="form-control col-md-7 col-xs-12" id="email" placeholder="Email del usuario" value="{{ $usuario->email or old('email') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email"> Password:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="radio">
                                <label>
                                    <input type="radio" class="flat" checked name="password" value="0"> Mantener Password
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" class="flat" name="password" value="1"> <span class="text-danger"><b>Resetear Password (Cédula)</b></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rol"> Rol:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            @foreach ($roles as $rol)
                                <div class="radio">
                                    <label>
                                        @if ($usuario->rol->nivel == $rol->nivel)
                                            <input type="radio" class="flat" checked name="rol" value="{{ $usuario->rol->id }}"> Nivel {{  $usuario->rol->nivel }} - {{ $usuario->rol->nombre }}
                                        @else
                                            <input type="radio" class="flat" name="rol" value="{{ $rol->id }}"> Nivel {{  $rol->nivel }} - {{ $rol->nombre }}
                                        @endif
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
    				<div class="ln_solid"></div>
    				<div class="form-group">
    					<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 text-center">
    						<a href={{ route('usuarios.index') }} class="btn btn-danger">Volver</a>
    						<button class="btn btn-default" type="reset">Limpiar</button>
    						<button class="btn btn-success" type="submit">Guardar</button>
    					</div>
    				</div>
    			</form>
      		</div>
    	</div>
  	</div>
</div>


