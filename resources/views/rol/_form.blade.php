<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
    	<div class="x_panel">
      		<div class="x_title">
        		<h2>Rol</h2>
        		<ul class="nav navbar-right panel_toolbox">
					<li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        		</ul>
        		<div class="clearfix"></div>
      		</div>
      		<div class="x_content">
        		<br />
        		@if ($rol->exists)
					<form id="form-rol" class="form-horizontal form-label-left" action={{ route('roles.update',  $rol->id) }} method="POST">
        		    	{{ method_field('PUT') }}
        		@else
        			<form id="form-rol" class="form-horizontal form-label-left" action={{ route('roles.store') }} method="POST">
        		@endif
    				{{ csrf_field() }}
    				<div class="form-group">
    					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre"><span class="required">*</span> Nombre:</label>
    					<div class="col-md-6 col-sm-6 col-xs-12">
    						<input type="text" name="nombre" class="form-control col-md-7 col-xs-12" id="nombre" placeholder="Nombre del Rol" value="{{ $rol->nombre or old('nombre') }}" autofocus>
                            @if ($errors->has('nombre'))
                                <span class="text-danger">{{ $errors->first('nombre') }}</span>
                            @endif
    					</div>
    				</div>
    				<div class="form-group">
    					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"><span class="required">*</span> Nivel:</label>
    					<div class="col-md-6 col-sm-6 col-xs-12">
    						<input type="text" name="nivel" class="form-control col-md-7 col-xs-12" placeholder="Nivel del Rol" value="{{ $rol->nivel or old('nivel') }}">
                            @if ($errors->has('nivel'))
                                <span class="text-danger">{{ $errors->first('nivel') }}</span>
                            @endif
    					</div>
    				</div>
    				<div class="ln_solid"></div>
    				<div class="form-group">
    					<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 text-center">
    						<a href={{ route('roles.index') }} class="btn btn-danger">Volver</a>
    						<button class="btn btn-default" type="reset">Limpiar</button>
    						<button class="btn btn-success" type="submit">Guardar</button>
    					</div>
    				</div>
    			</form>
      		</div>
    	</div>
  	</div>
</div>


