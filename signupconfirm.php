<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/signup_confirm.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway:600,900" rel="stylesheet">
	<link rel="icon" href="images/icon.png">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="scripts/animations/signup-confirm-animations.js"></script>
</head>
<body background="images/keyboard.jpeg">
	<?php include "includes/not_loggedin_redirect.php"?>
	<?php include "includes/navbar.php"?>
  <div id="confirmation-tile" class="confirmation-tile">
  	<span id="awesome" class="confirm-dialog" style="color: red">Awesome!</span>
  	<span id="registered" class="confirm-dialog">You're registered</span>
    <span id="click" class="confirm-dialog small">Click <a class="login-link" href="index.php">here</a> to start browsing!</span>
  </div>
</body>
<?php include "includes/footer.php"?>
</html>
