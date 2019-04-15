<!DOCTYPE html>
<html>
<head>
	<title>Feedback Form</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- icomoon -->
	<link rel="stylesheet" href="fonts/icomoon/style.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/feedback_form.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway:600,900" rel="stylesheet">
	<link rel="icon" href="images/icon.png">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="scripts/feedback.js"></script>
	<script type="text/javascript" src="scripts/animations/form_animations.js"></script>
</head>
<body background="images/keyboard.jpeg">
<?php include "includes/not_loggedin_redirect.php"?>
<?php include "includes/navbar.php"?>
	<div id="form-tile" class="form-tile feedback-tile">
    <span id="header" class="header">FEEDBACK</span>
    <div id="required-prompt" class="required-prompt">
      <p style="display: inline-block">All fields are required</p>
    </div>
    <form onsubmit="submitFeedback()" method="post">
      <div class="input-container">
        <input id="firstname" class="left" type="text" name="firstname" placeholder="First Name">
        <input id="lastname" class="right" type="text" name="lastname" placeholder="Last Name">
      </div>
      <div class="input-container">
        <input id="email" class="full" type="text" name="email" placeholder="Email">
      </div>
      <div id="contact-container" class="contact-container">
        <label class="contact-label">How should we contact you?</label>
        <select id="contact-select" class="contact-select" name="contact-option">
					<option value=" ">--Select--</option>
          <option value="email">Email</option>
          <option value="phone">Phone</option>
          <option value="website">Through our Website</option>
        </select>
      </div>
      <div id="issue-container" class="issue-container">
				<label id="issue-type" class="issue-type">Type of issue:</label>
				<div class="checkbox-container">
					<input class="checkbox" type="radio" name="issue" value="payment">
					<label id="payment-label" class="check-label">Payment</label>
				</div>
				<div class="checkbox-container">
					<input class="checkbox" type="radio" name="issue" value="shipping">
					<label id="shipping-label" class="check-label">Product</label>
				</div>
				<div class="checkbox-container bottom">
					<input class="checkbox" type="radio" name="issue" value="product">
					<label id="product-label" class="check-label">Shipping</label>
				</div>
				<div class="checkbox-container bottom">
					<input class="checkbox" type="radio" name="issue" value="product">
					<label id="product-label" class="check-label">Service</label>
				</div>
      </div>
			<div class="error-container">
				<p id="contact-error" class="error left">Please choose contact method</p>
				<p id="issue-error" class="error right">Please choose an issue</p>
			</div>
			<div class="text-area-container">
				<textarea id="comment" name="comment" rows="8" cols="80" class="comment" placeholder="Describe your issue" maxlength="450"></textarea>
				<div id="comment-count" class="comment-count">0/450</div>
			</div>
			<div class="error-container">
				<p id="text-error" class="error">Please describe your issue</p>
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
