<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/login.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="icon" href="images/icon.png">
	<link href="https://fonts.googleapis.com/css?family=Raleway:600,900" rel="stylesheet">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="scripts/animations/login-animations.js"></script>
	<script type="text/javascript" src="scripts/login.js"></script>
	<!-- <script type="text/javascript" src="scripts/hover_details.js"></script> -->
</head>
<body background="images/login_background.jpg">
<?php include "includes/navbar.php"?>
	<div id="login-tile" class="login-tile">
		<form action="loginconfirm.html" id="form" onsubmit="testValidityLogin()" method="post">
			<span id="login-header" class="login-header">LOGIN</span>
			<div id="username-container" class="input-container">
				<input id="username" type="text" class="username" name="username" placeholder="Username" maxlength="16">
				<p id="user-error" class="error">Please fill out a username</p>
			</div>
			<div id="password-container" class="input-container">
				<input id="password" class="password" type="password" name="password" placeholder="Password" maxlength="16">
					<p id="pass-error" class="error">Please fill out a password</p>
			</div>
			<div id="server-error-prompt" class="server-error-prompt"></div>
			<input id="login-btn" type="submit" class="login-btn" value="Login">
			<span id="sign-up" class="sign-up">Not a member? <a class="sign-up-link" href="signup.php">Sign up</a></span>
		</form>
	</div>
</body>
<?php include "includes/footer.php"?>
</html>
