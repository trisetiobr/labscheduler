$(document).ready(function(){
	//on load sidebar

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
	var formAlert = {
		"normal": "form-group",
		"error" : "form-group has-error",
		"success" : "form-group has-success",
		"warning": "form-group has-warning"
	};

	$('.form-required').on("blur", function(){
		var text = $(this).val();
		var parentDiv = $(this).closest('div');
		var helpBlock = $(this).next('.help-block');

		if(text == ""){
			$(parentDiv).attr('class',formAlert['error']);
			$(helpBlock).text('*The field is required');
		}
		else{
			$(parentDiv).attr('class',formAlert['normal']);
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
});