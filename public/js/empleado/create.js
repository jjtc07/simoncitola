$(document).ready(function() {
	$('#fecha_nacimiento, #fecha_inicio_institucion').daterangepicker({
		locale: {
	        format: "DD-MM-YYYY",
	        separator: " - ",
	        daysOfWeek: [
	            "Do",
	            "Lu",
	            "Ma",
	            "Mi",
	            "Ju",
	            "Vi",
	            "Sá"
	        ],
	        "monthNames": [
	            "Enero",
	            "Febrero",
	            "Marzo",
	            "Abril",
	            "Mayo",
	            "Junio",
	            "Julio",
	            "Agosto",
	            "Septiembre",
	            "Octubre",
	            "Noviembre",
	            "Diciembre"
	        ],
	        firstDay: 1
	    },
		singleDatePicker : true,
		singleClasses    : "picker_3",
		// startDate        : new Date(),

	});

	// $('#fin').data('daterangepicker').setStartDate(moment(new Date()).add(1, 'years'));

	// $( "#inicio, #fin" ).change(function() {
	// 	var inicio = moment($('#inicio').val(), "DD-MM-YYYY").format("Y");
	// 	var fin = moment($('#fin').val(), "DD-MM-YYYY").format("Y");

	// 	$('#nombre').val(inicio+"-"+fin);
	// });
});