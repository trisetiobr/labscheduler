$(document).ready(function(){
	// for input trim
	$(document).on('blur', '.input-trim', function(event){
		$(this).val(
			$.trim(
				$(this).val().replace(/ +(?= )/g,'')
			)
		);
	});

	// for input number
	$(document).on('keyup keypress change', '.input-number', function(event){
		if ((event.which < 48 || event.which > 57)
			&& event.which != 8 && event.which != 127 && event.key != 'ArrowLeft'
			&& event.key != 'ArrowUp' && event.key != 'ArrowRight' && event.key != 'ArrowDown'
			&& event.key != 'Tab' && event.key != 'F1' && event.key != 'F2' && event.key != 'F3'
			&& event.key != 'F4' && event.key != 'F5' && event.key != 'F6' && event.key != 'F7'
			&& event.key != 'F8' && event.key != 'F9' && event.key != 'F10' && event.key != 'F11'
			&& event.key != 'F12'
			)
		{
			event.preventDefault();
		}
	});

	// for input text only
	$(document).on('keyup keypress change', '.input-text', function(event){
		if ((event.which >= 48 && event.which <= 57)
			&& event.which != 8 && event.which != 127 && event.key != 'ArrowLeft'
			&& event.key != 'ArrowUp' && event.key != 'ArrowRight' && event.key != 'ArrowDown'
			&& event.key != 'Tab' && event.key != 'F1' && event.key != 'F2' && event.key != 'F3'
			&& event.key != 'F4' && event.key != 'F5' && event.key != 'F6' && event.key != 'F7'
			&& event.key != 'F8' && event.key != 'F9' && event.key != 'F10' && event.key != 'F11'
			&& event.key != 'F12'
			)
		{
			event.preventDefault();
		}
	});

	// to lower
	$(document).on('blur', '.input-tolower', function(evt){
		$(this).val($(this).val().toLowerCase());
	});

	// to upper
	$(document).on('blur', '.input-toupper', function(evt){
		$(this).val($(this).val().toUpperCase());
	});

	// for input email
	$('.input-email').on('blur', function(evt){

	});

	// for input phone
	$('.input-phone').on('keyup keypress change', function(evt){

	});

	// for input required
	$('.input-required').on('blur', function(evt){
		var message = "*the field is required";
		//$(this).closest('div.help-block');
		// code here
	});
	// =========== //
	// custom code //
	// =========== //
});