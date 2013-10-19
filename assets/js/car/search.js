$(document).ready(function() {


	$( ".datepicker" ).datepicker({
		showOtherMonths: true,
		dateFormat: 'yy-mm-dd',
		selectOtherMonths: true,
	});

	$( "#car-search-tabs" ).tabs({ active: 1 });

	$(".cities").autocomplete({
		source: availableTags
	});

	$(".datepicker_select").datepicker({dateFormat: "yy-mm-dd"});
	$('#portfolio-jcarousel').jcarousel({
		'visible' : 1,
		'scroll' : 1
	});
});