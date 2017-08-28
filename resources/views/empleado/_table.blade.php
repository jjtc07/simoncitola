<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
          <h2>Empleados</h2>
          <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
          </ul>
          <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <table id="datatable" class="table table-striped table-bordered jambo_table">
          <thead>
            <tr>
              <th>Nombres</th>
              <th>Apellidos</th>
              <th>Cedula</th>
              <th>Cargo</th>
              <th>Función</th>
              <th>Telefono</th>
              <th style="width: 80px;" class="text-center">
                <a href={{ route('empleados.create') }} class="btn btn-success btn-xs" title="Crear">
                    <i class="fa fa-plus"></i>
                </a>
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach($empleados as $empleado)
            <tr>
              <td>{{ $empleado->nombre." ".$empleado->nombre2}}</td>
              <td>{{ $empleado->apellido." ".$empleado->apellido2}}</td>
              <td>{{ $empleado->cedula }}</td>
              <td>{{ $empleado->cargo->nombre }}</td>
              <td>{{ $empleado->funcion->nombre }}</td>
              <td>{{ $empleado->telefono }}</td>
              <td class="text-center">
                <a href={{ route('empleados.show', $empleado->id) }} class="btn btn-success btn-xs" title="Detalle"><i class="fa fa-eye"></i></a>

                <button type="button" class="btn btn-danger btn-xs" title="Eliminar" data-toggle="modal" data-target=".modal-eliminacion" onclick="$('#id-eliminar').val('{{ $empleado->id }}')">
                    <i class="fa fa-trash-o"></i>
                </button>
                <a href={{ route('empleados.edit', $empleado->id) }} class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-pencil"></i></a>
              </td>
            </tr>
            @endforeach                        
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>