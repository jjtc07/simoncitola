<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Usuarios</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable" class="table table-striped table-bordered jambo_table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Cargo</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th style="width: 40px;" class="text-center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->empleado->nombre }}</td>
                            <td>{{ $usuario->empleado->apellido }}</td>
                            <td>{{ $usuario->empleado->cargo->nombre }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>Nivel {{  $usuario->rol->nivel }} - {{ $usuario->rol->nombre }}</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-danger btn-xs" title="Eliminar" data-toggle="modal" data-target=".modal-eliminacion" onclick="$('#id-eliminar').val('{{ $usuario->id }}')">
                                    <i class="fa fa-trash-o"></i>
                                </button>
                                <a href={{ route('usuarios.edit', $usuario->id) }} class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-pencil"></i></a>
                            </td>
                        </tr>
                        @endforeach                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>