$(document).ready(function() {
	initLocale();
});

function initLocale() {
	$('header .locales #en').click(function(){
		if (document.URL.indexOf("/en/")>-1) {

		} else {
			var newURL = document.URL.replace("/ru/","/en/");
			window.location.replace(newURL);			
		}
	})
	$('header .locales #ru').click(function(){
		if (document.URL.indexOf("/ru/")>-1) {

		} else {
			var newURL = document.URL.replace("/en/","/ru/");
			window.location.replace(newURL);			
		}
	})
}