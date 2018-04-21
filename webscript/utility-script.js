var Util = {
	baseUrl: function(){
		// source: https://stackoverflow.com/questions/25203124/how-to-get-base-url-with-jquery-or-javascript
		var getUrl = window.location;
		var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
		return baseUrl;
	},
	path: {
		join: function(dir1, dir2){
			return  dir1 + '/' + dir2;
		}
	}
}