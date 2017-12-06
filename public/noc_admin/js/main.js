$(document).ready(function() {
	closeAlert();
});

function closeAlert() {
	$(".alert-close").on( "click", function() {
  		$(this).parent(".alert").hide();
	});
}

