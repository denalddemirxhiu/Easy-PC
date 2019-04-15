$( document ).ready(function(){
	$('#confirmation-tile').addClass('animated fadeInUp');

	setTimeout(function(){
		$('#registered').css({visibility: "visible"});
		$('#registered').addClass('animated fadeInUp');
	}, 200);

	setTimeout(function(){
		$('#click').css({visibility: "visible"});
		$('#click').addClass('animated fadeInUp');
	}, 600);

})
