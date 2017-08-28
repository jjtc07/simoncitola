<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Empleados</h2> 
                <div class="clearfix"></div>
            </div>

            <!-- Single button -->
            <div class="btn-toolbar">
                <div class="btn-group">
                    <button type="button" class="btn btn-success">Cargar asistencia <i class="fa fa-plus" aria-hidden="true"></i></button>
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href='asistenciaEmpleado/crear/1' class="" title="Crear">
                        <h4>Entrada <i class="fa fa-sign-in"></i></h4>
                    </a></li>
                    <li><a href=asistenciaEmpleado/crear/2 class="" title="Crear">
                        <h4>Salida <i class="fa fa-sign-out"></i></h4>
                    </a></li>
                </ul>
                </div>

                <a href="asistenciaEmpleado/crear/3" class="btn btn-warning" title="Crear">
                    Cargar Inasistencia <i class="fa fa-sign-out"></i>
                </a>
            </div>


            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            </ul>

            <div class="x_content">
                <table id="datatable" class="table table-striped table-bordered jambo_table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Cedula</th>
                            <th>Presente</th>
                            <th>Hora de Entrada</th>
                            <th>Hora de Salida</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($asistencias as $asistencia)
                            <tr>
                                <th>{{$asistencia->empleado->nombre}}</th>
                                <th>{{$asistencia->empleado->apellido}}</th>
                                <th>{{$asistencia->empleado->cedula}}</th>
                                @if($asistencia->presente==1)
                                    <th>Si</th>
                                @else
                                    <th>No</th>
                                @endif
                                <th>{{$asistencia->hora_entrada}}</th>
                                <th>{{$asistencia->hora_salida}}</th>
                            </tr>
                        @endforeach                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>