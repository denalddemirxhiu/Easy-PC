<!DOCTYPE html>
<html>

<head>
	<title>Information</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="scripts/animations/image_slider.js" type="text/javascript"> </script>
	<link rel="stylesheet" type="text/css" href="css/information.css">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans">
	<link href="https://fonts.googleapis.com/css?family=Raleway:600,900" rel="stylesheet">
	<link rel="icon" href="images/icon.png">
</head>
<body>
<?php include "includes/navbar.php"?>
<div class="main-info">
	<section class="info-about">
		<div class="info-about-textbox">

			<h1> More about us </h1>

			<p> Easy PC consistently offers the widest selection of the most reliable products, coupled with the best service and performance throughout your rental experience. When you rent a computer, our proven software-loading services save you time and effort, allowing you to focus on your critical business activities. Our state-of-the-art, dependable technology is available locally, nationally and internationally</p>

		</div>
	</section>
</div>


<section>
	<h1 style="text-transform: uppercase; font-size: 3.5rem"> <center> What we offer </center> </h1>
	<div class="buttons">
			<button class="desktopButton" onclick="toggleVis('desktop')"> Desktop </button>
			<button class="workButton" onclick="toggleVis('workstation')"> Workstation </button>
			<button class="displayButton" onclick="toggleVis('displays')"> Displays </button>
			<button class="appleButton" onclick="toggleVis('apple')"> Apple Devices </button>
	</div>
	<div class="show desktop">
			<h1> Desktop Rentals</h1>
			<p> We offer a variety of rental solutions to meet your unique computer equipment rental requirements. Our proven experts understand all types of business segments. Do you have a need for PC rentals or perhaps MAC computer rentals? Is your need specifically for desktop computer rentals that are all the same manufacturer model number? If so, we’ve got you covered and can deliver them today! If you need to rent a PC or rent a MAC, choose from the top-of-the-line manufacturers such as HP, Lenovo, IBM, Dell and Apple. We will configure your desktop rental to your exact specifications, all for a competitive price. We are the one source for every type of computer rental desktop. Installations and network configuration are also available for your personal computer rental.</p>
	</div>

	<div class="show workstation">
			<h1> Workstation Rentals</h1>
			<p> At Easy PC, we carefully select the appropriate workstation rental equipment to meet your particular business requirements. When high-end graphics and speed are of upmost importance, we can accommodate. Our trained sales professionals can work with you to find the right product. When you have a short-term requirement for workstation rentals, Easy PC will provide your business with a flexible and reliable rental option. Workstation rentals – From the latest brand name equipment including HP, IBM and Dell. Workstation rent – your key to success!
			</p>
	</div>

	<div class="show displays">
			<h1> Display Rentals</h1>
			<p> Choose from all types of computer monitors and LCD rentals, whether you’re looking for a high-resolution LCD flat panel or a plasma screen rental.

			Find a monitor rental with displays ranging in size from 17” up to 50”. LCD wide-screens with speakers systems are also available. Whenever you need to rent a monitor, we have the right inventory from top suppliers such as:  Planar, Sony, NEC, IBM, Dell, Apple, Pioneer and more.

			If your business needs multiple monitor rentals for an upcoming event or for in-house training, contact Easy PC for all your technology needs.

			Rent an LCD, plasma or any kind of display today for delivery to your desired location the next day!
			</p>
	</div>

	<div class="show apple">
			<h1> Apple Rentals</h1>
			<p> Looking to rent Apple products to help keep your team productive? Even while they travel? Rent the latest iPad from Easy PC Computer Rentals and you could have improved efficiency delivered to you tomorrow.

			If your business need is to rent powerful desktops or the most advanced notebooks, Easy PC has the Apple prouducts to meet your rental needs. All available for overnight delivery.
			</p>
	</div>
</section>

<br>
<br>

<hr width="80%">

<br>
<br>

<h1 style="font-size:4rem; margin-bottom: -25px;"> <center> Gallery </center> </h1>
<div class="container">

	<div class="slider-wrapper">
		<div class="inner-wrapper">
			  <div class="slide" style="background-image: url('images/officecomp.jpg'); background-position: center;"> Flexible </div>
				<div class="slide" style="background-image: url('images/imac.jpg'); background-position:center;"> Reliable </div>
				<div class="slide" style="background-image: url('images/macbook.jpg'); background-position:center;"> Fast </div>
				<div class="slide" style="background-image: url('images/surface.jpg'); background-position:center;"> Effortless </div>
		</div>
	</div>
	<div class="button prev"> </div>
	<div class="button next"> </div>
</div>

<section class="reviews">
	<h1> Reviews </h1>
	<div class="reviewGallery">
		<p class="reviewText"> One of the few companies out there that are always reliable and provide great service <br>
		 - The Verge </p>

		<p class="reviewText"> With Easy PC you cannot go wrong. It guarantees success for your company! <br> - Techradar </p>

		<p class="reviewText"> Hands down one of the best new services in 2018. <br> - CNET </p>
	</div>


</section>


</body>
<?php include "includes/footer.php"?>
</html>
