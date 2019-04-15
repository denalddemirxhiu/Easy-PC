$("document").ready(function () {
  $("#cancel-btn").click(function() {
    $("#form-tile").addClass("animated zoomOut")
    setTimeout(function(){
      window.location.replace("account_management.php");
    }, 400);
  });
});

function submitUsername() {

  event.preventDefault();

  var username_o = $("#old-username").val();
  var username_n = $("#new-username").val();
  var password = $("#password").val();

  var regexFirstAlpha = /^[a-zA-Z].*/;
  var regexOnlyAlphaNum = /^\w+$/;

  var uno = unn = pw = true;

  $("#old-user-error").css({visibility: "hidden"});
  $("#new-user-error").css({visibility: "hidden"});
  $("#pass-error").css({visibility: "hidden"});

  $("#old-username").removeClass('box-shadow-inset');
  $("#new-username").removeClass('box-shadow-inset');
  $("#password").removeClass('box-shadow-inset');

  $("#server-error-prompt").css({display: "none"});

  if (username_o.length < 2 || !regexFirstAlpha.test(username_o) || !regexOnlyAlphaNum.test(username_o) || username_o.length > 16) {
    $("#old-username").addClass('box-shadow-inset');
    $("#old-user-error").css({visibility: "visible"});
    uno = false;
  } if (username_n.length < 2 || !regexFirstAlpha.test(username_n) || !regexOnlyAlphaNum.test(username_n) || username_n.length > 16) {
    $("#new-username").addClass('box-shadow-inset');
    $("#new-user-error").css({visibility: "visible"});
    unn = false;
  } if (password.length == 0) {
    $("#password").addClass('box-shadow-inset');
    $("#pass-error").css({visibility: "visible"});
    pw = false;
  }

  $("#cancel-btn").click(function() {
    window.location.replace("account_management.php");
  });

  if (uno && unn && pw) {
    var dataString = 'username_o=' + username_o + '&username_n=' + username_n + '&password=' + password;

    var url = "http://localhost/easy-pc/includes/usernametoDb.php"
    $.ajax({
      type: "POST",
      url: url,
      data: dataString,
      success: function(data) {
        var data = JSON.parse(data);
        if (data.result == 'username_o') {
          $("#server-error-prompt").html('<p id="server-error">Server rejected form - Please out your current username correctly</p>');
          $("#form-tile").css({height: "620px"});
        } else if (data.result == 'username_n') {
          $("#server-error-prompt").html('<p id="server-error">Server rejected form - Please fill out new username correctly</p>');
          $("#form-tile").css({height: "620px"});
        } else if (data.result == 'password') {
          $("#server-error-prompt").html('<p id="server-error">Server rejected form - That password is incorrect</p>');
          $("#form-tile").css({height: "620px"});
        } else if (data.result == 'username_taken') {
          $("#server-error-prompt").html('<p id="server-error">Server rejected form - That username is already taken</p>');
          $("#form-tile").css({height: "620px"});
        } else if (data.result == 'database') {
          $("#server-error-prompt").html('<p id="server-error">Could not connect to database</p>');
          $("#form-tile").css({height: "620px"});
        } else if (data.result == 'valid') {
          $("#form-tile").addClass('animated zoomOut');
          setTimeout(function(){
            window.location.replace("account_updated.php");
          }, 400);
        }
      }
    });
  }

}
