<!DOCTYPE html>
<html>
<head>
	<title>Login Confirmation</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/login.css">
	<link rel="stylesheet" href="css/login_confirm.css">
	<link rel="stylesheet" href="css/animate.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway:600,900" rel="stylesheet">
	<link rel="icon" href="images/icon.png">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="scripts/animations/login-confirmed-animations.js"></script>
</head>
<body background="images/login_background.jpg">
	<?php include "includes/not_loggedin_redirect.php"?>
	<?php include "includes/navbar.php"?>
<div id="confirmation-tile" class="confirmation-tile">
	<span id="red-text" class="confirm-dialog" style="color: red">Awesome!</span>
	<span id="white-text" class="confirm-dialog">You're all logged in</span>
</div>
</body>
<?php include "includes/footer.php"?>
</html>
