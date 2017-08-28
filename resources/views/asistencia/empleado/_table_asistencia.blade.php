<div class="x_content skinFlat">
      <table id="datatable" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Cedula</th>
            <th>Fecha de Naciemiento</th>
            @if($id==1)
              <th class="text-center text-primary"><i class="fa fa-sign-in fa-2x" aria-hidden="true"></i></th>
            @else
              <th class="text-center text-success"><i class="fa fa-sign-out fa-2x" aria-hidden="true"></i></th>
            @endif
          </tr>
        </thead>

        <tbody>
          @foreach($empleados as $empleado)
          <tr id="empleado{!!$empleado->id!!}">
            <td>{{ $empleado->nombre }}</td>
            <td>{{ $empleado->apellido }}</td>
            <td>{{ $empleado->cedula }}</td>
            <td>{{ $empleado->fecha_nacimiento }}</td>
            <td class="text-center"><input type="checkbox" class="" name="" id="{{$empleado->id}}"></td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <br>
        <button id="registrarAsistencia" class="btn btn-info pull-right" value={{$id}}>
          Registrar 
        </button>
   </div>
 </div>