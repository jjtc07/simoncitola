var empleados=[];
var url="http://localhost:8000/asistenciaEmpleado";
var urlinasistencia="http://localhost:8000/inasistenciaEmpleado";
var empleadosInasistentes=[];

function agregarEliminar(id){
		$('#empleado'+id).toggleClass('info');
		if( ! $('#'+id).is(':checked') ) {
			empleados.push(id);
    	}else{
    		index=empleados.indexOf(id);
			empleados.splice(index,1);
		}
}

function registrarEntrada(id) {

	if (id==1) {
		$.ajaxSetup({
			url: url,
			type: 'POST',
			dataType: 'json',
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    	}
		});

		$.ajax({
			data: {
				empleados: empleados
			}
		})
		.done(function() {
			console.log("hola");
			window.location.replace(url);
			/*cambiarTipo(celdaDia, siguienteTipo);*/
		})
		.fail(function(error) {
			/*console.log(error.status);*/
		});
	}else{
		
		$(empleados).each(function(index,value) {
			$.ajaxSetup({
				url: url+'/'+value,
				type: 'PUT',
				dataType: 'json',
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    	}
			});
			$.ajax({
				data: {
					empleado: value
				}
			})
		});
		
		window.location.replace(url);
	}
	
}

function registrarInasistencia(inasistentes){
	$.ajaxSetup({
		url: urlinasistencia,
		type: 'POST',
		dataType: 'json',
		   headers: {
		       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
    $.ajax({
		data: {
			empleados: inasistentes
		}
	});

}

$(document).ready(function() {

	$('#registrarAsistencia').click(function() {
		id= $("#registrarAsistencia").val();
		registrarEntrada(id);
	});

	$('.skinFlat input').on('ifClicked', function(event){
    	var id = $(this).attr("id");
    	if (id!='marcarTodo') {
			agregarEliminar(id);
			console.log(empleados);
    	}
    })

    $('.skinFlatRed input').on('ifClicked', function(event){
    	var id = $(this).attr("id");
    	if (id!='marcarTodo') {
			agregarEliminar(id);
			console.log(empleados);
    	}
    })

    $('#registrarInasistencia').click(function() {
		$(empleados).each(function(index,value) {
			console.log(value);
			var justificacion = $("#input"+value).val();
			empleadosInasistentes.push({
				empleado_id: value,
				justificacion: justificacion
			});
		});
		registrarInasistencia(empleadosInasistentes);
		window.location.replace(url);
	});

	$('#registrarTodos').click(function(){
		empleadosInasistentes=[];
		var justificacion = $("#textJustificacion").val();
		console.log(justificacion);
		$("#datatable tbody tr").each(function (index) 
        {
            var campo1;
            $(this).children("td").each(function (index2) 
            {
                switch (index2) 
                {
                    case 5: {
		                    	empleadosInasistentes.push({
		                    		empleado_id: $(this).attr('value'),
		                    		justificacion: justificacion
		                    	});
		                    	break
                           	}
                }
            })
        });
        registrarInasistencia(empleadosInasistentes);
		window.location.replace(url);
	});
	
});