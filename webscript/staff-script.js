//===================================================================================//
//								CONFIGURATION										 ||
//===================================================================================//

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
//list of required field in form
var form_config = {
	"pengajar/tambah": [
		"#username",
		"#name",
		"#password",
		"#email",
		"#phone"
	]
};
//===================================================================================//
//								FUNCTION LIST										 ||
//===================================================================================//
var checkFieldAvailability;
var checkPasswordStrength;
var init;
var submitBtnForm;
var getCurrentForm;
var fieldAutocomplete;
//===================================================================================//
//								JQUERY												 ||
//===================================================================================//

$(document).ready(function(){
	//form alert
	var form_alert = config['form-alert'];
	var password_rule = config['password-rule'];
	var currentForm;
	var url = window.location.href;
	var targetUrl = url.split('/')[5];

	init = function(){
		urls = url.split('/');
		currentForm = targetUrl+'/'+urls[urls.length-1];
	}
	init();
	
	//side-bar click
	$(".active.treeview").attr('class','treeview');
	$("#btn-"+targetUrl).attr('class','active treeview');
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
	//required field in form
	$('.field-required').on("blur", function(){
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
			}
		}
		$(this).val(textOutput);
	});
	//form number only input
	$('.txt-number').on("keypress keyup blur", function(event){
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
	//disabled submit button when required fill is empty	
	$('input').on("blur", function(){
		for(var i=0; i<form_config[currentForm].length; i++){
			if($(form_config[currentForm][i]).val() == ""){
				$('#submit').attr('class', 'btn btn-primary disabled');
			}
			else{
				$('#submit').attr('class', 'btn btn-primary');	
			}
		}
	});

	checkFieldAvailability = function(id, target, controller){
		var parentDiv = $("#"+id).closest('div');
		var inputValue = $("#"+id).val();
		if(inputValue.length > 0){
			$.ajax({
				url: controller,
				data: { id: inputValue},
				type: "POST",
				success: function(response){
					var helpText = "";	
					if(inputValue.length == 1){
						helpText = inputValue.toUpperCase();
					}
					else{
						helpText = inputValue.charAt(0).toUpperCase() + inputValue.slice(1);
					}
					if(response == '0'){
						$(parentDiv).attr('class', form_alert['success']);
						$("#"+target).text(id+" "+helpText+' available');
					}
					else{
						$(parentDiv).attr('class', form_alert['error']);
						$("#"+target).text(id+" "+helpText+' already exists');
					}
				}
			});
		}
	}

	checkPasswordStrength = function(){
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
	}
});