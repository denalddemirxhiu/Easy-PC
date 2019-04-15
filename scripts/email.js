$("document").ready(function () {
  $("#cancel-btn").click(function() {
    $("#form-tile").addClass("animated zoomOut")
    setTimeout(function(){
      window.location.replace("account_management.php");
    }, 400);
  });
});

function submitEmail() {

  event.preventDefault();

  var email_o = $("#old-email").val();
  var email_n = $("#new-email").val();
  var password = $("#password").val();

  var regexEmail = /^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!\.)){0,61}[a-zA-Z0-9]?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!$)){0,61}[a-zA-Z0-9]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/;

  var eo = en = pw = true;

  $("#old-email-error").css({visibility: "hidden"});
  $("#new-email-error").css({visibility: "hidden"});
  $("#pass-error").css({visibility: "hidden"});

  $("#old-email").removeClass('box-shadow-inset');
  $("#new-email").removeClass('box-shadow-inset');
  $("#password").removeClass('box-shadow-inset');

  $("#server-error").css({display: "none"});

  if (email_o.length == 0 || !regexEmail.test(email_o) || email_o.length > 45) {
    $("#old-email-error").css({visibility: "visible"});
    $("#old-email").addClass('box-shadow-inset');
    eo = false;
  } if (email_n.length == 0 || !regexEmail.test(email_n) || email_n.length > 45) {
    $("#new-email-error").css({visibility: "visible"});
    $("#new-email").addClass('box-shadow-inset');
    en = false;
  } if (password.length == 0) {
    $("#pass-error").css({visibility: "visible"});
    $("#password").addClass('box-shadow-inset');
    pw = false;
  }

  if (eo && en && pw) {
    var dataString = 'email_o=' + email_o + '&email_n=' + email_n + '&password=' + password;

    var url = "http://localhost/easy-pc/includes/emailtoDb.php";

    $.ajax({
      type: "POST",
      url: url,
      data: dataString,
      datatype: "JSON",
      success: function(data) {
        var data = JSON.parse(data);
        if (data.result == 'email_o') {
          $("#server-error-prompt").html('<p id="server-error">Server rejected form - Please out your current email correctly</p>');
          $("#form-tile").css({height: "620px"});
        } if (data.result == 'email_n') {
          $("#server-error-prompt").html('<p id="server-error">Server rejected form - Please out your new email correctly</p>');
          $("#form-tile").css({height: "620px"});
        } if (data.result == 'password') {
          $("#server-error-prompt").html('<p id="server-error">Server rejected form - Please out your password correctly</p>');
          $("#form-tile").css({height: "620px"});
        } if (data.result == 'database') {
          $("#server-error-prompt").html('<p id="server-error">Could not connect to database</p>');
          $("#form-tile").css({height: "620px"});
        } else if (data.result == 'valid') {
          console.log(data.result);
          $("#form-tile").addClass('animated zoomOut');
          setTimeout(function(){
            window.location.replace("account_updated.php");
          }, 400);
        }
      }
    });

  }
}
