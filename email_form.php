<!DOCTYPE html>
<html>
<head>
	<title>Update Email</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- icomoon -->
  <link rel="stylesheet" href="fonts/icomoon/style.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/account_form.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway:600,900" rel="stylesheet">
	<link rel="icon" href="images/icon.png">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="scripts/email.js"></script>
	<script type="text/javascript" src="scripts/animations/form_animations.js"></script>
</head>
<body background="images/login_background.jpg">
<?php include "includes/not_loggedin_redirect.php"?>
<?php include "includes/navbar.php"?>
	<div id="form-tile" class="form-tile">
    <span id="header" class="header">CHANGE EMAIL</span>
    <div id="required-prompt" class="required-prompt">
      <p style="display: inline-block">All fields are required</p>
      <?php include "includes/hover_tile.php"?>
    </div>
		<form id="email-form" onsubmit="submitEmail()" method="post">
      <div class="input-container">
        <input id="old-email" type="text" name="old-email" placeholder="Old Email">
        <p id="old-email-error" class="error">Please fill out your old email properly</p>
      </div>
      <div class="input-container">
        <input id="new-email" type="text" name="new-email" placeholder="New Email">
        <p id="new-email-error" class="error">Please fill out the new email properly</p>
      </div>
      <div class="input-container">
        <input id="password" type="password" name="password" placeholder="Password">
        <p id="pass-error" class="error">Please fill out your password</p>
      </div>
      <div id="server-error-prompt" class="server-error-prompt"></div>
			<div class="button-container">
				<input id="submit-btn" type="submit" class="submit-btn" value="Submit">
				<button id="cancel-btn" type="button" class="cancel-btn" value="Cancel">Cancel</button>
			</div>
    </form>
</div>
</body>
<?php include "includes/footer.php"?>
</html>
