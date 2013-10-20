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

	$(".datepicker_select").datepicker({
		dateFormat: "yy-mm-dd",
		beforeShowDay: unavailable
	});
	$('#portfolio-jcarousel').jcarousel({
		'visible' : 1,
		'scroll' : 1
	});

	function unavailable(date) {
		//get current date
		var curr_date = new Date();

		//convert date to number for comparing
		dmy = date.getFullYear() + '' + ("0" + (date.getMonth() + 1)).slice(-2)  + '' + ("0" + date.getDate()).slice(-2);
		curr_dmy = curr_date.getFullYear()  + '' + ("0" + (curr_date.getMonth() + 1)).slice(-2)  + '' + ("0" + curr_date.getDate()).slice(-2);

		if (dmy > curr_dmy) {
			return [true, ""];
		} else {
			return [false, "", "Unavailable"];
		}
	}

});


