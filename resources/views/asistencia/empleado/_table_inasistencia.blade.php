<div class="x_content skinFlatRed">
      <table id="datatable" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Cedula</th>
            <th>Fecha de Naciemiento</th>
            <th>Justificacion</th>
            <th class="text-center text-danger"><i class="fa fa-user-times fa-2x" aria-hidden="true"></i></th>
          </tr>
        </thead>

        <tbody>
          @foreach($empleados as $empleado)
          <tr id="empleado{!!$empleado->id!!}">
            <td>{{ $empleado->nombre }}</td>
            <td>{{ $empleado->apellido }}</td>
            <td>{{ $empleado->cedula }}</td>
            <td>{{ $empleado->fecha_nacimiento }}</td>
            <td>
            	<div class="form-group">
                <div class="col-md-12 col-sm-12 col-xs-12">
                 <input type="text" name="justificacion" class="form-control col-md-12 col-xs-12" id="input{!!$empleado->id!!}" placeholder="Justificacion de inasistencia">
               </div>
    			   </div>
            </td>
            <td value="{!!$empleado->id!!}" class="text-center"><input type="checkbox" class="" name="" id="{{$empleado->id}}"></td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <br>
        <div class="btn-toolbar">
          <button id="registrarInasistencia" class="btn btn-info pull-right" value={{$id}}>
            Registrar 
          </button>
          <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target=".bs-example-modal-lg">Marcar Todos</button>
        </div>
   </div>
 </div>