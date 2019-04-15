<!DOCTYPE html>
<html>
<head>
	<title>Manage Account</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- icomoon -->
	<link rel="stylesheet" href="fonts/icomoon/style.css">
	<link rel="stylesheet" href="css/account_management.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="icon" href="images/icon.png">
	<link href="https://fonts.googleapis.com/css?family=Raleway:600,900" rel="stylesheet">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="scripts/account_mgmt.js"></script>
</head>
<body background="images/login_background.jpg">
<?php include "includes/not_loggedin_redirect.php"?>
<?php include "includes/navbar.php"?>
<div id="button-tile" class="button-tile">
  <div class="adress-btn-container bottom">
    <button id="address-btn" type="button" name="address"><p class="icon-compass2 icon-holder"></p><p class="text-container">Add/Update Address Info</p></button>
  </div>
  <div class="username-btn-container bottom">
    <button id="username-btn" class="username-btn" type="button" name="username"><p class="icon-user icon-holder"></p><p class="text-container">Change Username</p></button>
  </div>
  <div class="password-btn-container bottom">
    <button id="password-btn" class="password-btn" type="button" name="password"><p class="icon-key icon-holder"></p><p class="text-container">Change Password</p></button>
  </div>
  <div class="email-btn-container last">
    <button id="email-btn" class="email-btn" type="button" name="email"><p class="icon-envelop icon-holder"></p><p class="text-container">Change Email</p></button>
  </div>
</div>
</body>
<?php include "includes/footer.php"?>
</html>
