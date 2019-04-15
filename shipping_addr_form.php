<!DOCTYPE html>
<html>
<head>
	<title>Update Shipping Info</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- icomoon -->
  <link rel="stylesheet" href="fonts/icomoon/style.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/shipping_addr_form.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway:600,900" rel="stylesheet">
	<link rel="icon" href="images/icon.png">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="scripts/animations/ship-addr-animations.js"></script>
	<script type="text/javascript" src="scripts/shipping_addr_form.js"></script>
  <script type="text/javascript" src="scripts/hover-details.js"></script>
</head>
<body background="images/login_background.jpg">
<?php include "includes/not_loggedin_redirect.php"?>
<?php include "includes/navbar.php"?>
	<div id="ship-addr-tile" class="ship-addr-tile">
		<form id="ship-addr-form" onsubmit="submitAddress()" method="post">
	    <span id="ship-add-header" class="ship-add-header">SHIPPING ADDRESS FORM</span>
      <div id="required-prompt" class="required-prompt">
				<p style="display: inline-block">All non-optional fields are required</p>
				<p id="question-mark" class="icon-question"></p>
        <?php include "includes/hover_tile.php"?>
			</div>
      <div id="server-error-prompt" class="server-error-prompt"></div>
      <div id="sa-container" class="input-container">
        <input id="street" type="text" class="left" name="street" placeholder="Street">
        <input id="apartment" type="text" class="right" name="apartment" placeholder="Apartment (Optional)">
      </div>
      <div id="error-container" class="error-container">
        <p id="street-error" class="error left">Please fill out a street</p>
        <p id="apartment-error" class="error">Please fill out a proper apartment</p>
      </div>
      <div id="cp-container" class="input-container">
        <input id="city" type="text" class="left" name="city" placeholder="City">
        <input id="postal" type="text" class="right" name="postal" placeholder="Postal Code (A2A 2A2)">
      </div>
      <div id="error-container" class="error-container">
        <p id="city-error" class="error left">Please fill out a city</p>
        <p id="postal-error" class="error">Please fill out a proper postal code</p>
      </div>
      <div id="pc-container" class="input-container">
        <input id="country" type="text" class="left" name="country" placeholder="Country">
        <input id="phone" type="text" class="right" name="phone" placeholder="Phone #">
      </div>
      <div id="error-container" class="error-container">
        <p id="country-error" class="error left">Please fill out a country</p>
        <p id="phone-error" class="error right">Please fill out a phone #</p>
      </div>
			<div class="button-container">
				<input id="submit-btn" type="submit" class="submit-btn" value="Submit!">
				<button id="cancel-btn" type="button" class="cancel-btn" value="Cancel">Cancel</button>
			</div>
		</form>
	</div>
</body>
<?php include "includes/footer.php"?>
</html>
