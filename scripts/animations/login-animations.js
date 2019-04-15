$( document ).ready(function(){
	$('#login-tile').addClass('animated fadeInUp');

	setTimeout(function(){
		$('#login-header').css({visibility: "visible"});
		$('#login-header').addClass('animated fadeInUp');
	}, 200);

	setTimeout(function(){
		$('#username-container').css({visibility: "visible"});
		$('#username').addClass('animated fadeInUp');
	}, 300);

	setTimeout(function(){
		$('#password-container').css({visibility: "visible"});
		$('#password').addClass('animated fadeInUp');
	}, 400);

	setTimeout(function(){
		$('#login-btn').css({visibility: "visible"});
		$('#login-btn').addClass('animated fadeInUp');
	}, 500);

	setTimeout(function(){
		$('#sign-up').css({visibility: "visible"});
		$('#sign-up').addClass('animated fadeInUp');
	}, 600);

})
