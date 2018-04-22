var Form = {
	config: {
		validation: {
			'required-class': 'input-required',
			'error-class': 'has-error',
			'message': 'This field is required.',
		},
	},
	validation: function(target, type){
		var fConfig = Form.config.validation;

		// get all input list
		var $inputs = $(target + ' :input:not(:button)');
		
		
		// formatting
		var rules = { };
		if(type['format'] == true &&  type['format'] != undefined){
			for(let i = 0; i < $inputs.length; i++){
				$input = $inputs[i];
				let name = $input.name;
				let id = '#'+$input.id;
				let is_required = $(id).hasClass(fConfig['required-class']);
				if(is_required){
					rules[name] = { 'required': true }
				}
			}
		}
		
		$( target ).validate({
		  rules: rules,
		  highlight: function (element, errorClass) {
	      $(element).closest('.form-group').addClass(fConfig['error-class']);
	    },
		  messages: {
		  	'Subject[code]': {
		  		required: fConfig['message'],
		  	}
		  },
		});

	}
}