$(document).ready(function() {
	initRespHavigation();
});

function initRespHavigation() {
	var onNav = function() {
		if($('.menu_inner ul').is(':visible')) {
			$('.menu_inner ul').hide();
			$('.menu_handle').removeClass('active');			
			mobile=true;
			$('body').removeClass('navigation');
		} else {
			$('.menu_handle').addClass('active');
			$('.menu_inner ul').show();
			mobile=true;
			$('body').addClass('navigation');
		}
	}
	$('.menu_handle').bind('click', onNav).bind('tap', onNav);
}