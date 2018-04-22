$(document).ready(function(){
	
	// form validation
	$(document).on('click', '#submit', function(){
			var target_id = 'subject-form';
			Form.validation( '#'+target_id, { 'format': true });
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