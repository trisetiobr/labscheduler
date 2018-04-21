var Modal = {
	confirmation: function(modal_target, model, model_id, template){
		$(modal_target + ' :input[type=submit]').attr('data-id', model_id);
		$(modal_target + ' :input[type=submit]').attr('data-model', model);
		Ajax.db.getById(model, model_id, '', function(res1){
			Template.render(template, res1.data);
		});
	},
}