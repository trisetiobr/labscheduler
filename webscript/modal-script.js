var Modal = {
	confirmation: function(modal_target, model, model_id, template){
		var template = {
			'._content_': '%nama% will be deleted permanently.'
		};
		
		$(modal_target + ' :input[type=submit]').attr('data-id', model_id);
		$(modal_target + ' :input[type=submit]').attr('data-model', model);
		Ajax.db.getByPk(model, model_id, '', function(res1){
			if(res1.result == 1 || res1.result == '1'){
				Template.render(modal_target, res1.model, template);
			}
		});
	},
}