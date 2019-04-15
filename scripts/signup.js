function testValiditySignup() {
  // stopping page from switching
  event.preventDefault();
  // Getting input values
  var firstname = $("#first-name").val();
  var lastname = $("#last-name").val();
  var username = $("#username").val();
  var password = $("#password").val();
  var passwordConf = $("#password-conf").val();
  var email = $("#email").val();
  // Setting regular expressions for testing fields
  var regexFirstAlpha = /^[a-zA-Z].*/;
  var regexOnlyAlphaNum = /^\w+$/;
  var regexContainsNum = /\d.*/;
  var regexExclAstr = /.*[!|\*].*/;
  var regexOnlyAlpha = /^[A-z]+$/;
  var regexEmail = /^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!\.)){0,61}[a-zA-Z0-9]?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!$)){0,61}[a-zA-Z0-9]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/;
  // Check for AJAX call
  var fn = ln = un = pw = em = pwc = true;
  // Hidding errors
  $("#first-error").css({visibility: "hidden"});
  $("#last-error").css({visibility: "hidden"});
  $("#user-error").css({visibility: "hidden"});
  $("#pass-error").css({visibility: "hidden"});
  $("#email-error").css({visibility: "hidden"});
  $("#pass-diff-error").css({visibility: "hidden"});

  $("#first-name").removeClass('box-shadow-inset');
  $("#last-name").removeClass('box-shadow-inset');
  $("#username").removeClass('box-shadow-inset');
  $("#password").removeClass('box-shadow-inset');
  $("#password-conf").removeClass('box-shadow-inset');
  $("#email").removeClass('box-shadow-inset');

  $("#server-error").css({display: "none"});

  // Validating each field in form
  // Comment the next 5 if's to test server validation
  if (firstname.length < 2 || !regexOnlyAlpha.test(firstname) || firstname.length > 20) {
    $("#first-name").addClass('box-shadow-inset');
    $("#first-error").css({visibility: "visible"});
    fn = false;
  } if (lastname.length < 2 || !regexOnlyAlpha.test(lastname) || lastname.length > 20) {
    $("#last-name").addClass('box-shadow-inset');
    $("#last-error").css({visibility: "visible"});
    ln = false;
  } if (username.length < 2 || !regexFirstAlpha.test(username) || !regexOnlyAlphaNum.test(username) || username.length > 16) {
    $("#username").addClass('box-shadow-inset');
    $("#user-error").css({visibility: "visible"});
    un = false;
  } if (password.length < 8 || password.length > 16 || !regexExclAstr.test(password) || !regexFirstAlpha.test(password) || !regexContainsNum.test(password)) {
    $("#password").addClass('box-shadow-inset');
    $("#pass-error").css({visibility: "visible"});
    pw = false;
  } if (email.length < 1 || !regexEmail.test(email)) {
    $("#email").addClass('box-shadow-inset');
    $("#email-error").css({visibility: "visible"});
    em = false;
  } if (password != passwordConf || passwordConf == '') {
    $("#password-conf").addClass('box-shadow-inset');
    $("#pass-diff-error").css({visibility: "visible"});
    pwc = false;
  }
  // If form is valid it is submitted to server
  if (fn && ln && un && pw && em && pwc) {
    var dataString = 'firstname=' + firstname + '&lastname=' + lastname + '&username=' + username
                      + '&password=' + password + "&email=" + email;

    var url = "http://localhost/easy-pc/includes/signuptoDb.php"

    $.ajax({
      type: "POST",
      url: url,
      data: dataString,
      datatype: "jsonObject",
      success: function(data){
        var data = JSON.parse(data);
        // Setting errors based on what's passed back from server validation
          if (data.result == 'invalid') {
            $("#server-error-prompt").html('<p id="server-error">Server rejected form - Please fill out accordingly</p>');
            $("#signup-tile").css({height: "620px"});
          } else if (data.result == 'email-invalid') {
            $("#server-error-prompt").html('<p id="server-error">Server rejected form - Email already exists</p>');
            $("#signup-tile").css({height: "620px"});
          } else if (data.result == "username-invalid") {
            $("#server-error-prompt").html('<p id="server-error">Server rejected form - Username already exists</p>');
            $("#signup-tile").css({height: "620px"});
          } else if (data.result == "database") {
            $("#server-error-prompt").html('<p id="server-error">Error connecting to database</p>');
            $("#signup-tile").css({height: "620px"});
          } else if (data.result == 'valid') {
            window.location.replace("signupconfirm.php");
          }
        }
    })
  }
}
