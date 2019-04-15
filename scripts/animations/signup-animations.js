$( document ).ready(function(){
	$('#signup-tile').addClass('animated fadeInUp');

	setTimeout(function(){
		$('#signup-header').css({visibility: "visible"});
		$('#signup-header').addClass('animated fadeInUp');
	}, 200);

	setTimeout(function(){
		$('#required-prompt').css({visibility: "visible"});
		$('#required-prompt').addClass('animated fadeInUp');
	}, 400);

	setTimeout(function(){
		$('#name-container').css({visibility: "visible"});
		$('#name-container').addClass('animated fadeInUp');
	}, 300);

	setTimeout(function(){
		$('#login-info-container').css({visibility: "visible"});
		$('#login-info-container').addClass('animated fadeInUp');
	}, 400);

	setTimeout(function(){
		$('#password-container').css({visibility: "visible"});
		$('#password-container').addClass('animated fadeInUp');
	}, 600);


  setTimeout(function(){
		$('#signup-btn').css({visibility: "visible"});
		$('#signup-btn').addClass('animated fadeInUp');
	}, 600);

  setTimeout(function(){
    $('#login').css({visibility: "visible"});
    $('#login').addClass('animated fadeInUp');
  }, 700);

})
