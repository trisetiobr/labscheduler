$(document).ready(function(){
	//load configuration
	var config = {
		"form-alert" : {
			"normal": "form-group",
			"error" : "form-group has-error",
			"success" : "form-group has-success",
			"warning": "form-group has-warning"
		},
		"button-submit": {
			"disabled": "btn btn-primary disabled",
			"enabled": "btn btn-primary enabled"
		},
		"password-rule":{
			"minlength": 4,
			"power": {
				"lowercase": 1,
				"minlength": 2,
				"uppercase": 4,
				"numeric": 4,
				"unique-char": 8
			},
			"password-strength": {
				"weak": 4,
				"medium": 8,
				"strong": 12,
				"very-strong": 16 
			}
		}
	};

	var form_config = {
		"pengajar-tambah": [
			"#username",
			"#name",
			"#password",
			"#email",
		]
	}
	//side-bar click
	var url = window.location.href;
	var target = url.split('/')[5];
	$(".active.treeview").attr('class','treeview');
	$("#btn-"+target).attr('class','active treeview');
	
	//side bar button
	$('.click-menu').click(function(){
		var redirect_url = $(this).attr('href');
		window.location.href = redirect_url;
	});

	//href link
	$('.btn-href').click(function(){
		var redirect_url = $(this).attr('href');
		window.location.href = redirect_url;
	});

	//trim input text whitespace
	$('input').on("blur", function(){
		var text = $(this).val();
		var textList = text.split(" ");
		var textOutput = "";
		var firstText = 0;
		for(var i = 0; i < textList.length; i++){
			if(firstText == 0 && textList[i] != ""){
				textOutput = textList[i];
				firstText = 1;
			}
			else if (textList[i] != ""){
				textOutput = textOutput + " " + textList[i];
				console.log(textList[i]);
			}
		}
		$(this).val(textOutput);
	});

	//form alert
	var form_alert = config['form-alert'];
	var password_rule = config['password-rule'];

	$('#password').on("keydown", function(){
		var passLength = $(this).val().length;
		var passText = $(this).val();
		var parentDiv = $(this).closest('div');
		var helpBlock = $(this).next('.help-block');
		var power = 0;
		if(passLength < password_rule['minlength']){
			$(parentDiv).attr('class', form_alert['alert']);
			$(helpBlock).text('*The password is too short');
		}
		else{
			
			power = power + Math.floor(passLength/password_rule['power']['minlength']);
			if(passText.match(/[a-z]/)){
				power = power + password_rule['power']['lowercase'];
			}
			if(passText.match(/[A-Z]/)){
				power = power + password_rule['power']['uppercase'];
			}
			if(passText.match(/[0-9]/)){
				power = power + password_rule['power']['numeric'];
			}

			if(power <= password_rule['password-strength']['weak']){
				$(parentDiv).attr('class', form_alert['warning']);
				$(helpBlock).text('*Password strength: weak');
			}
			else if(power <= password_rule['password-strength']['medium']){
				$(parentDiv).attr('class', form_alert['warning']);
				$(helpBlock).text('*Password strength: medium');
			}
			else if(power <= password_rule['password-strength']['strong']){
				$(parentDiv).attr('class', form_alert['success']);
				$(helpBlock).text('*Password strength: strong');
			}
			else {
				$(parentDiv).attr('class', form_alert['success']);
				$(helpBlock).text('*Password strength: very strong');
			}
		}
	});

	$('.form-required').on("blur", function(){
		var text = $(this).val();
		var parentDiv = $(this).closest('div');
		var helpBlock = $(this).next('.help-block');

		if(text == ""){
			$(parentDiv).attr('class',form_alert['error']);
			$(helpBlock).text('*The field is required');
		}
		else{
			$(parentDiv).attr('class',form_alert['normal']);
			$(helpBlock).text('');
		}
	});

	//form number only input
	$('.txt-number').on("keypress keyup blur", function(event){
		if ((event.which < 48 || event.which > 57)
			&& event.which != 8
			&& event.which != 127
			&& event.key != 'ArrowLeft'
			&& event.key != 'ArrowUp'
			&& event.key != 'ArrowRight'
			&& event.key != 'ArrowDown'
			&& event.key != 'Tab'
			&& event.key != 'F1'
			&& event.key != 'F2'
			&& event.key != 'F3'
			&& event.key != 'F4'
			&& event.key != 'F5'
			&& event.key != 'F6'
			&& event.key != 'F7'
			&& event.key != 'F8'
			&& event.key != 'F9'
			&& event.key != 'F10'
			&& event.key != 'F11'
			&& event.key != 'F12'
			){
			event.preventDefault();
		}
	});

	$('#username').on("blur", function(){
		var parentDiv = $(this).closest('div');
		var helpBlock = $(this).next('.help-block');
		$.ajax({
			url: "ajax_check_username",
			data: { username : $(this).val()},
			type: "POST",
			success: function(response){
				console.log(response);
				if(response == '0'){
					$(parentDiv).attr('class',form_alert['success']);
					$(helpBlock).text('Username available');
				}
				else if(response == '1'){
					$(parentDiv).attr('class',form_alert['error']);
					$(helpBlock).text('Username already exists');
				}
				else{
					$(parentDiv).attr('class',form_alert['error']);
					$(helpBlock).text('*The field is required');
				}
			}
		});
	});
});