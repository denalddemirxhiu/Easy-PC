window.onload = init;
var index = 0;

function init() {
	carousel();
}


function carousel() {

	var images = document.getElementsByClassName("image");

	for (var i = 0; i < images.length; i++){
		images[i].style.display = "none";
	}

	index++;

	if(index > images.length) {
		index = 1;
	}

	images[index-1].style.display = "inline-block";

	setTimeout(carousel, 2500);
}
