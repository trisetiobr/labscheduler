// Ajax namespace
var Ajax = {
	config: {
		"default_url": {
			"call": "",
			"create": "",
			"create_by_conds": "",
			"get_by_pk": Util.path.join(Util.baseUrl(), 'ajax/ajax_db/get_by_pk'),
			"get_by_conds": "",
			"update_by_id": "",
			"update_by_conds": "",
			"delete_record_by_id": "",
			"delete_record_by_conds": "",
		}
	},
	call: function(url ,params, callback){
		if( url == '' || url == null){
			url = Ajax.config['default_url']['call'];
		}

		$.ajax({
			async: true,
			cache: false,
			type: 'post',
			url: url,
			data: { 'params': params },
			success: function(result){
				var data = JSON.parse(result);
				callback(data);
			},
			error: function(result){
				callback(result);
			}
		});
	},
	db: {
		create: function(model, data, url, callback){
			// assign default target of ajax url
			if( url == '' || url == null){
				url = Ajax.config['default_url']['create'];
			}

			$.ajax({
				async: true,
				cache: false,
				type: 'post',
				url: url,
				data: { 'model': model, 'data': data },
				success: function(result){
					var data = JSON.parse(result);
					callback(data);
				},
				error: function(result){
					callback(result);
				}
			});
		},
		createByConds: function(model, data, condition, url, callback){
			if( url == '' || url == null){
				url = Ajax.config['default_url']['create_by_conds'];
			}

			$.ajax({
				async: true,
				cache: false,
				type: 'post',
				url: url,
				data: { 'model': model, 'data': data, 'condition': condition },
				success: function(result){
					var data = JSON.parse(result);
					callback(data);
				},
				error: function(result){
					callback(result);
				}
			});
		},
		getByPk: function(model, pk, url, callback){
	
			if( url == '' || url == null){
				url = Ajax.config['default_url']['get_by_pk'];
			}
			$.ajax({
				async: true,
				cache: false,
				type: 'post',
				url: url,
				data: { 'model': model, 'pk': pk },
				success: function(result){
					var data = JSON.parse(result);
					callback(data);
				},
				error: function(result){
					callback(result);
				}
			});

		},
		getByConds: function(model, condition, url, callback){

			if( url == '' || url == null){
				url = Ajax.config['default_url']['get_by_conds'];
			}

			$.ajax({
				async: true,
				cache: false,
				type: 'post',
				url: url,
				data: { 'model': model, 'condition': condition },
				success: function(result){
					var data = JSON.parse(result);
					callback(data);
				},
				error: function(result){
					callback(result);
				}
			});

		},
		checkById: function(model, id, url, callback){
			if( url == '' || url == null){
				url = Ajax.config['default_url']['check_record_by_id'];
			}

			$.ajax({
				async: true,
				cache: false,
				type: 'post',
				url: url,
				data: { 'model': model, 'id': id },
				success: function(result){
					var data = JSON.parse(result);
					if(data.result == 1 || data.result == '1'){
						callback(1);	
					}
					else{
						callback(0);
					}
				},
				error: function(result){
					callback(result);
				}
			});
		},
		updateById: function(model, id, data, url, callback){
			if( url == '' || url == null){
				url = Ajax.config['default_url']['update_by_id'];
			}

			$.ajax({
				async: true,
				cache: false,
				type: 'post',
				url: url,
				data: { 'model': model, 'id': id, 'data': data },
				success: function(result){
					var data = JSON.parse(result);
					callback(data);
				},
				error: function(result){
					callback(result);
				}
			});
		},
		updateByConds: function(model, data, condition, url, callback){
			if( url == '' || url == null){
				url = Ajax.config['default_url']['update_by_conds'];
			}

			$.ajax({
				async: true,
				cache: false,
				type: 'post',
				url: url,
				data: { 'model': model, 'data': data, 'conditions': condition },
				success: function(result){
					var data = JSON.parse(result);
					callback(data);
				},
				error: function(result){
					callback(result);
				}
			});
		},
		deleteById: function(model, id, url, callback){
			// assign default target of ajax url
			if( url == '' || url == null){
				url = Ajax.config['default_url']['delete_record_by_id'];
			}

			$.ajax({
				async: true,
				cache: false,
				type: 'post',
				url: url,
				data: { 'model': model, 'id': id },
				success: function(result){
					var data = JSON.parse(result);
					callback(data);
				},
				error: function(result){
					callback(result);
				}
			});
		},
		deleteByConds: function(model, condition, url, callback){
			// assign default target of ajax url
			if( url == '' || url == null){
				url = Ajax.config['default_url']['delete_record_by_condition'];
			}

			$.ajax({
				async: true,
				cache: false,
				type: 'post',
				url: url,
				data: { 'model': model, 'condition': condition },
				success: function(result){
					var data = JSON.parse(result);
					callback(data);
				},
				error: function(result){
					callback(result);
				}
			});
		}
	}
}