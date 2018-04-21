$(document).ready(function(){
	// test ajax call
	$('#ajax-call').on('click', function(){
		
		var url = Util.path.join(Util.baseUrl(), 'ajax/ajax_db/call');
		var params = { 'model': 'User' };
		
		Ajax.call(url, params, function(callback1){
			$('#ajax-call-outp').val(JSON.stringify(callback1));
		});
	
	});

	// test db create
	$('#db-create').on('click', function(){

		var url = Util.path.join(Util.baseUrl(), 'ajax/ajax_db/create');
		var model = 'User';
		var data = { 'id': 1, 'username': 'testing', 'email': 'email@email.com' };
		
		Ajax.db.create(model, data, url, function(callback1){
			$('#db-create-outp').val(JSON.stringify(callback1));
		});
	
	});

	
});