$(document).ready(function() {
  $("#comment").keyup(function() {
    var current = $(this).val().length;
    var max = 450;
    $("#comment-count").html(current + '/' + max);
  });
})

function submitFeedback() {

  event.preventDefault();

  var contact = $('#contact-select').find(":selected").text();
  var issue = $('input[name=issue]:checked').val();
  var comment = $("#comment").val();

  var cont = iss = com = true;

  var regexEmail = /^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!\.)){0,61}[a-zA-Z0-9]?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!$)){0,61}[a-zA-Z0-9]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/;

  $("#contact-error").css({visibility: "hidden"});
  $("#issue-error").css({visibility: "hidden"});
  $("#text-error").css({visibility: "hidden"});

  $("#comment").removeClass('box-shadow-inset');

  if (comment.length == 0) {
    $("#text-error").css({visibility: "visible"});
    $("#comment").addClass('box-shadow-inset');
    cont = false;
  } if (contact == "--Select--") {
    $("#contact-error").css({visibility: "visible"});
    iss = false;
  } if (issue == null) {
    $("#issue-error").css({visibility: "visible"});
    com = false;
  }

  if (cont && iss && com) {

    var dataString = 'contact=' + contact + '&issue=' + issue + '&comment=' + comment;

    var url = "http://localhost/easy-pc/includes/feedbacktoDb.php";
    $.ajax({
      type: "POST",
      url: url,
      data: dataString,
      datatype: "jsonObject",
      success: function(data) {
        var data = JSON.parse(data);

        if (data.result == 'comment') {
          $("#server-error-prompt").html('<p id="server-error">Server rejected form - Describe your issue</p>');
          $("#feedback-tile").css({height: "900px"});s
        } else if (data.result == 'contact') {
          $("#server-error-prompt").html('<p id="server-error">Server rejected form - Please select a contact method</p>');
          $("#feedback-tile").css({height: "900px"});
        } else if (data.result == "issue") {
          $("#server-error-prompt").html('<p id="server-error">Server rejected form - Please tell us the type of issue</p>');
          $("#feedback-tile").css({height: "900px"});
        } else if (data.result == "database") {
          $("#server-error-prompt").html('<p id="server-error">Sorry, could not connect to the database</p>');
          $("#feedback-tile").css({height: "900px"});
        } else if (data.result == 'valid') {
          $("#form-tile").addClass('animated zoomOut');
          setTimeout(function(){
            window.location.replace("feedback_confirm.php");
          }, 400);
        }

      }
    });
  }

}
