$( document ).ready(function(){
	$('#confirmation-tile').addClass('animated fadeInUp');

	setTimeout(function(){
		$('#red-text').css({visibility: "visible"});
		$('#red-text').addClass('animated fadeInUp');
	}, 200);

	setTimeout(function(){
		$('#white-text').css({visibility: "visible"});
		$('#white-text').addClass('animated fadeInUp');
	}, 400);
})
