window.onload = getCartInfo;



function getCartInfo() {
	event.preventDefault();



	$.ajax({
		type: "GET",
		url: "http://localhost/easy-pc/includes/getCartInfo.php",
		data: "",
		success: function(data) {
			var cartInfo = JSON.parse(data);

			if(cartInfo[0].product_name != "empty") {

				$(".cart-header").html("Your Cart ("+cartInfo.length+")");

				for(var i = 0; i < cartInfo.length; i++) {
					$(".cart-items").append("<div class='product-tile' id='tile-"+ i +"'> </div>");

					$("#tile-"+i).html("<div class='product-info' id='info-"+i+"'> </div> <div class='product-price' id='price-"+i+"'> </div>");

					$("#info-"+i).append(
						"<span style='font-size: 20px;font-weight: 600;'>Product Name: "  + cartInfo[i].product_name + "</span><br> " +
						"Description: " + cartInfo[i].description + " <br>" +
						"Product ID: " + cartInfo[i].productId +
						"<br> Amount of weeks you want to rent? <input type='number' class='week' id='"+cartInfo[i].productId+"'min=1 max=52 value='1'>"
					);

					$("#price-"+i).append(
						"Price <br> " + cartInfo[i].rent_price + "/week <br> " +
						"<button class='removeButton' value='"+cartInfo[i].productId+"' onclick='removeItem(this.value)'> Remove </button>"
					);

				}

				$(".cart-items").append("<button class='checkoutButton' onclick='rentProducts()'> Rent </button>");

			} else {
				$(".cart-header").html("Your Cart");
				$(".cart-items").html("<p style='font-size:20px; font-weight: 400;'>There are no items in your cart!</p>");
			}

		}
	});



}

//"-webkit-animation-duration": "15s"

function rentProducts() {
	var weeks = getProductsAndWeeks();


	$("#cart-box").addClass("animated zoomOut");

	window.scrollTo(0, 0);
	setTimeout(function(){
		$('#confirm-tile').css({visibility: "visible"});
		$('#confirm-tile').addClass('animated zoomIn');

	}, 400);
	$.get("http://localhost/easy-pc/includes/rentProducts.php?weeks="+weeks);
	return false;
}

function removeItem(id) {
	$.ajax({
		type: "GET",
		url: "http://localhost/easy-pc/includes/freedata.php?id="+id,
		data: "",
		success: function(data) {
			$(".cart-items").html("");
			getCartInfo();
		}
	});
}

function getProductsAndWeeks() {
	// Getting all the values of the number of desired weeks of
	// renting each product and creating a JSON String to be processed
	// by the server side script
	var numWeeks = document.getElementsByClassName("week");
	var jsonString = "{";
	for(var i = 0; i < numWeeks.length; i++)
	{
		jsonString += '"'+ numWeeks[i].id + '"' + ":"  + numWeeks[i].value + ",";
	}

	jsonString = jsonString.slice(0, -1);
	jsonString += "}";

	return jsonString;
}
