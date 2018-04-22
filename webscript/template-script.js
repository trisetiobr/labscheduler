var Template = {
	render: function(target, data, template){
		for(let fieldname in data){
			for(let key in template){
				let content = template[key];
				let re = new RegExp('%'+fieldname+'%',"g");
				console.log(fieldname);
				content = content.replace(re, data[fieldname]);
				console.log(content);
				$(target+ ' ' + key).html(content);
			}
		}
	}
}