$(document).ready(function(){
	//on load sidebar

	//side-bar click
	var url = window.location.href;
	var target = url.split('/')[5];

	$(".active.treeview").attr('class','treeview');

	$("#btn-"+target).attr('class','active treeview');
	$('.click-menu').click(function(){
		var redirect_url = $(this).attr('href');
		window.location.href = redirect_url;
//		window.location.replace(redirect_url);
	});
	/*
	$('.click-menu').click(function(){
		var target = $(this).attr('target');

		$(".active.treeview").attr('class', 'treeview');
		$("#"+target).attr('class', 'active treeview');
	});*/
});