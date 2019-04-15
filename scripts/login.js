function testValidityLogin() {
  event.preventDefault();

  var username = $("#username").val();
  var password = $("#password").val();

  var un = pw = true;

  $("#user-error").css({visibility: "hidden"});
  $("#pass-error").css({visibility: "hidden"});

  $("#username").removeClass('box-shadow-inset');
  $("#password").removeClass('box-shadow-inset');

  $("#server-error").css({display: "none"});

  if (username == "") {
    $("#username").addClass('box-shadow-inset');
    $("#user-error").css({visibility: "visible"});
    un = false;
  } if (password == "") {
    $("#password").addClass('box-shadow-inset');
    $("#pass-error").css({visibility: "visible"});
    pw = false;
  }

  if (un && pw) {
    var dataString = 'username=' + username + '&password=' + password;
    var url = "http://localhost/easy-pc/includes/login-check.php";

    $.ajax({
      type: "POST",
      url: url,
      data: dataString,
      datatype: "json",
      success: function(data){
        var data = JSON.parse(data);
        if (data.result == 'username') {
          $("#server-error-prompt").html('<p id="server-error">Username does not exist</p>');
          $("#login-tile").css({height: "415px"});
        } else if (data.result == 'password') {
          $("#server-error-prompt").html('<p id="server-error">That password is incorrect</p>');
          $("#login-tile").css({height: "415px"});
        } else if (data.result == 'empty') {
          $("#server-error-prompt").html('<p id="server-error">Please fill in all the fields</p>');
          $("#login-tile").css({height: "415px"});
        } else if (data.result == 'database') {
          $("#server-error-prompt").html('<p id="server-error">Could not connect to database</p>');
          $("#login-tile").css({height: "415px"});
        } else if (data.result == 'valid'){
          window.location.replace("loginconfirm.php");
        }
      }
    })
  }
}
