<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/animate.css">
	<!-- icomoon -->
	<link rel="stylesheet" href="fonts/icomoon/style.css">
	<link rel="stylesheet" href="css/signup.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway:600,900" rel="stylesheet">
	<link rel="icon" href="images/icon.png">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="scripts/animations/signup-animations.js"></script>
	<script type="text/javascript" src="scripts/signup.js"></script>
	<script type="text/javascript" src="scripts/hover-details.js"></script>
</head>
<body background="images/keyboard.jpeg">
	<?php include "includes/navbar.php"?>
	<div id="signup-tile" class="signup-tile">
		<form id="signup-form" onsubmit="testValiditySignup()" method="post">
	    <span id="signup-header" class="signup-header">Signup</span>
			<div id="required-prompt" class="required-prompt">
				<p style="display: inline-block">All fields are required</p>
				<p id="question-mark" class="icon-question"></p>
				<?php include "includes/hover_tile.php"?>
			</div>
			<div id="server-error-prompt" class="server-error-prompt"></div>
			<span id="name-container" class="name-container">
				<input id="first-name" type="text" class="left-input" name="firstname" placeholder="First Name" maxlength="20">
				<input id="last-name" type="text" class="right-input" name="lastname" placeholder="Last Name" maxlength="20">
			</span>
			<div id="error-container" class="error-container">
				<p id="first-error" class="error left">Please fill out a proper first name</p>
				<p id="last-error" class="error">Please fill out a proper last name</p>
			</div>
			<span id="login-info-container" class="login-info-container">
				<input id="username" type="text" class="left-input" name="username" placeholder="Username" maxlength="16">
				<input id="email" class="right-input" type="email" name="email" placeholder="Email" maxlength="45">
				<div id="error-container" class="error-container">
					<p id="user-error" class="error left">Please fill out a proper username</p>
					<p id="email-error" class="error">Please fill out a proper email</p>
				</div>
			</span>
			<span id="password-container" class="password-container">
				<input id="password" type="password" class="left-input" name="password" placeholder="Password" maxlength="16">
				<input id="password-conf" type="password" class="right-input" name="password-conf" placeholder="Confirm Password" maxlength="16">
			</span>
			<div id="error-container" class="error-container">
				<p id="pass-error" class="error left">Please fill out a proper password</p>
				<p id="pass-diff-error" class="error">Please make sure passwords match</p>
			</div>
			<input id="signup-btn" type="submit" class="signup-btn" value="Signup!">
			<span id="login" class="login">Already a member? <a class="login-link" href="login.php">Sign in!</a></span>
		</form>
	</div>
</body>
<?php include "includes/footer.php"?>
</html>
