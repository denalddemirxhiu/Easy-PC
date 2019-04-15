<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/cart.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,600,900" rel="stylesheet">
	<link rel="icon" href="images/icon.png">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="scripts/cart.js"></script>
</head>

<body background="images/cart-image.jpg">
<?php include "includes/navbar.php"?>
<div class="container">
	<div id="cart-box" class="cart-box">
		<span class="cart-header">Your Cart</span>
			<div class="cart-items">


				<!--<button class="checkoutButton" onclick="freeData()"> Free data </button> -->
				<!-- <button class="checkoutButton" onclick="rentProducts()"> Rent </button> -->
			</div>
			<!-- <input type="number" min=1 max=52 value=1> -->
		</div>
		<div id="confirm-tile" class="cart-box" style="visibility: hidden">
			Congratulations! You have successfully rented your items!
			Click <a href="http://localhost/easy-pc/index.php"> here </a> to go home!
		</div>
	</div>
</div>
<?php include "includes/footer.php"?>
</body>
</html>
