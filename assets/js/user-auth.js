jQuery(function($) {
    "use strict";

	$('.jve-signup-link').on('click', function(){
		$('#login').modal("hide");
		$('#signup').modal("show");
	})

	$('.jve-signin-link').on('click', function(){
		$('#signup').modal("hide");
		$('#login').modal("show");
	})

	$('.jve-forget-password-link').on('click', function(){
		$('#login').modal("hide");
		$('#forget-password').modal("show");
	})
	
});