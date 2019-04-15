$("document").ready(function () {
  $("#cancel-btn").click(function() {
    $("#form-tile").addClass("animated zoomOut")
    setTimeout(function(){
      window.location.replace("account_management.php");
    }, 400);
  });
});

function submitPassword() {
  event.preventDefault();

  var password_o = $('#old-password').val();
  var password_n = $('#new-password').val();
  var password_c = $('#confirm-password').val();

  var regexContainsNum = /\d.*/;
  var regexExclAstr = /.*[!|\*].*/;
  var regexFirstAlpha = /^[a-zA-Z].*/;

  var po = pn = pc = true;

  $("#old-pass-error").css({visibility: "hidden"});
  $("#new-pass-error").css({visibility: "hidden"});
  $("#confirm-pass-error").css({visibility: "hidden"});

  $("#old-password").removeClass('box-shadow-inset');
  $("#new-password").removeClass('box-shadow-inset');
  $("#confirm-password").removeClass('box-shadow-inset');

  $("#server-error").css({display: "none"});

  if (password_o.length < 8 || password_o.legth > 16 || !regexExclAstr.test(password_o) || !regexFirstAlpha.test(password_o) || !regexContainsNum.test(password_o)) {
    $("#old-pass-error").css({visibility: "visible"});
    $("#old-password").addClass('box-shadow-inset');
    po = false;
  }  if (password_n.length < 8 || password_n.legth > 16 || !regexExclAstr.test(password_n) || !regexFirstAlpha.test(password_n) || !regexContainsNum.test(password_n)) {
      $("#new-pass-error").css({visibility: "visible"});
      $("#new-password").addClass('box-shadow-inset');
      pn = false;
  }  if (password_c.length < 8 || password_c.length > 16 || !regexExclAstr.test(password_c) || !regexFirstAlpha.test(password_c) || !regexContainsNum.test(password_c)) {
      $("#confirm-pass-error").css({visibility: "visible"});
      $("#confirm-password").addClass('box-shadow-inset');
      pc = false;
  }

  if (po && pn && pc) {
    var dataString = 'password_o=' + password_o + '&password_n=' + password_n + '&password_c=' + password_c;

    var url = "http://localhost/easy-pc/includes/passwordtoDb.php"

    $.ajax({
      type: "POST",
      url: url,
      data: dataString,
      success: function(data) {
        var data = JSON.parse(data);
        if (data.result == 'password_o') {
          $("#server-error-prompt").html('<p id="server-error">Server rejected form - Please out your current password correctly</p>');
          $("#form-tile").css({height: "620px"});
        } else if (data.result == 'password_n') {
          $("#server-error-prompt").html('<p id="server-error">Server rejected form - Please fill out your new password correctly</p>');
          $("#form-tile").css({height: "620px"});
        } else if (data.result == 'password_c') {
          $("#server-error-prompt").html('<p id="server-error">Server rejected form - Passwords do not match</p>');
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
