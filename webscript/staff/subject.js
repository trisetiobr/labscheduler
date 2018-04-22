$(document).ready(function(){
	
	// form validation
	$( "#subject-form" ).validate({
	  rules: {
	    'Subject[code]': {
	      required: true,
	    },
	    'Subject[name]': {
	    	required: true,
	    },
	  },
	  highlight: function (element, errorClass) {
        $(element).closest('.form-group').addClass('has-error');
    },
	  messages: {
	  	'Subject[code]': {
	  		required: 'We need the subject code as identifier',
	  	}
	  },
	});

	// click delete button in datatable
	$(document).on('click', '._delete_', function(){
		// open modal delete conf
		var modal_target = $(this).attr('data-target');
		// assign model_id
		var model_id = $(this).attr('data-id');
		// assign model_name
		var model = 'subject_model';
		// template view
		var template = { '_content_': '%_name_% will be permanently deleted' };
		var ajax_url = '';
		Modal.confirmation(modal_target, model, model_id, ajax_url, template);
	})
});