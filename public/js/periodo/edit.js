$(document).ready(function() {
	$('#inicio, #fin').daterangepicker({
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

	});

	$('#inicio').data('daterangepicker').setStartDate(moment($('#inicio').val(), "DD-MM-YYYY"));
	$('#fin').data('daterangepicker').setStartDate(moment($('#fin').val(), "DD-MM-YYYY"));

	$( "#inicio, #fin" ).change(function() {
		var inicio = moment($('#inicio').val(), "DD-MM-YYYY").format("Y");
		var fin = moment($('#fin').val(), "DD-MM-YYYY").format("Y");

		$('#nombre').val(inicio+"-"+fin);
	});
});