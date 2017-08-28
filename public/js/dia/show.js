
function setDiaNoLaborable(celdaDia) {

	if(celdaDia.hasClass('finSemana')){
		celdaDia.removeClass('escolarFinSemana administrativoFinSemana');
	}else{
		celdaDia.removeClass('administrativo ');
		celdaDia.addClass('noLaborable');
	}

	celdaDia.attr('tipo', 'libre');
}

function setDiaAdministrativo(celdaDia) {

	if(celdaDia.hasClass('finSemana')){
		celdaDia.removeClass('noLaborableFinSemana escolarFinSemana');
		celdaDia.addClass('administrativoFinSemana');
	}else{
		celdaDia.removeClass('noLaborable');
		celdaDia.addClass('administrativo');
	}

	celdaDia.attr('tipo', 'administrativo'); 
}

function setDiaEscolar(celdaDia) {

	if(celdaDia.hasClass('finSemana')){
		celdaDia.removeClass('administrativoFinSemana noLaborableFinSemana');
		celdaDia.addClass('escolarFinSemana');
	}else{
		celdaDia.removeClass('administrativo noLaborable');
		celdaDia.addClass('escolar');
	}

	celdaDia.attr('tipo', 'escolar'); 
}

function setFinSemana(celdaDia) {
	celdaDia.addClass('finSemana');
}

function cambiarTipo(celdaDia, tipo) {

	if(celdaDia.finSemana){
		setFinSemana(celdaDia);
	}
	switch(tipo){
		case 'libre':{
			setDiaNoLaborable(celdaDia);
		}break;
		case 'administrativo':{
			setDiaAdministrativo(celdaDia);
		}break;
		case 'escolar':{
			setDiaEscolar(celdaDia);
		}break;
	}
}

function cargarDias(){

	var obj;
	var celdaDia;
	var celdaSemana;
	var semana_anio = -1;
	var mesAnio = 0;
	for (var i = 0; i < calendarioEscolar.length; i++) {
		obj = calendarioEscolar[i];

		celdaDia = $("table[mes='"+obj.mes+"'] tr[semana='"+obj.semana_mes+"'] td[posicion="+obj.dia_semana+"]");
		
		celdaDia.text(obj.dia);
		celdaDia.attr('fecha', obj.anio+'-'+obj.mes+'-'+obj.dia);
		celdaDia.attr('tipo', obj.tipo);
		celdaDia.addClass('valido');

		if(obj.fin_semana*1){
			celdaDia.addClass('finSemana');
		}

		cambiarTipo(celdaDia, obj.tipo); 

		if(semana_anio!=obj.semana_anio || mesAnio!=obj.mes){
			celdaSemana = celdaDia.parent().find('td:first');
			celdaSemana.text(obj.semana_anio);
			celdaSemana.addClass('numSemana');

			if(obj.semana_mes==5 || obj.semana_mes==6){
				celdaSemana.parent().removeAttr('hidden');
			}

			semana_anio = obj.semana_anio;
			mesAnio = obj.mes;
		}
	}
}

$(document).ready(function() {
	cargarDias();

	$.ajaxSetup({
		url: urlUpdate,
		type: 'PUT',
		dataType: 'json',
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
	
	$("td.valido").click(function(){

		var celdaDia      = $(this);
		var tipoDias      = ['libre', 'administrativo', 'escolar'];
		var siguienteTipo = tipoDias[(tipoDias.indexOf(celdaDia.attr('tipo'))+1)%3];

		$.ajax({
			data: {
				fecha: celdaDia.attr('fecha'),
				tipo: siguienteTipo
			}
		})
		.done(function() {
			cambiarTipo(celdaDia, siguienteTipo);
		})
		.fail(function(xhr, status, error) {
			switch(xhr.status){
				case 403:{
					$("#numError").text("403");
					$("#tituloError").text("¡Acceso Denegado!");
					$("#descripcionError").text("Usted no tiene permisos para modificar el Calendario Escolar.");
					$("#iconoError").addClass('fa-lock');
				}break;

				case 404:{
					$("#numError").text("404");
					$("#tituloError").text("Recurso no localizado");
					$("#descripcionError").text("El recurso al que intenta acceder no ha podido ser encontrado.");
					$("#iconoError").addClass('fa-question');
				}break;

				case 500:{
					$("#numError").text("500");
					$("#tituloError").text("Error interno");
					$("#descripcionError").text("Ha ocurrido un error en el servidor mientras se procesaba su petición.");
					$("#iconoError").addClass('fa-bug');
				}break;

				default:{
					$("#numError").text(xhr.status);
					$("#tituloError").text(error);
					$("#descripcionError").text(error);
					$("#iconoError").addClass('fa-frown-o');
				}break;
			}
			$('.modal-error403').modal('toggle');			
		});
	});
});