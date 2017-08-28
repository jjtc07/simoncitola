$(document).ready(function() {

	$('#seccion').change(function(event) {
		$('#cupos').html(obtenerCupos($(this).val()));

	});
	
	$("#seccion").trigger( "change" );
});


function obtenerCupos(id) {
	cupos = 0

	secciones.forEach( function(element, index) {
		if (id == element.id) {
			cupos = element.cupos_disponibles;
		}
	});

	return cupos;
}