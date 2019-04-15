$("document").ready(function () {

  var button_tile = $("#button-tile");
  var addr_form = "shipping_addr_form.php";
  var user_form = "username_form.php";
  var pass_form = "password_form.php";
  var email_form = "email_form.php";

  $('#button-tile').addClass('animated fadeInUp');
  $('#button-tile').css({visibility: "visible"});

  setTimeout(function(){
    $('#address-btn').css({visibility: "visible"});
    $('#address-btn').addClass('animated fadeInUp');
  }, 200);

  setTimeout(function(){
    $('#username-btn').css({visibility: "visible"});
    $('#username-btn').addClass('animated fadeInUp');
  }, 300);

  setTimeout(function(){
    $('#password-btn').css({visibility: "visible"});
    $('#password-btn').addClass('animated fadeInUp');
  }, 400);

  setTimeout(function(){
    $('#email-btn').css({visibility: "visible"});
    $('#email-btn').addClass('animated fadeInUp');
  }, 500);

  $("#address-btn").click(function() {
    zoomOut(button_tile);
    replacePage(addr_form);
  });

  $("#username-btn").click(function() {
    zoomOut(button_tile);
    replacePage(user_form);
  });

  $("#password-btn").click(function() {
    zoomOut(button_tile);
    replacePage(pass_form);
  });

  $("#email-btn").click(function() {
    zoomOut(button_tile);
    replacePage(email_form);
  });



  function zoomOut(element) {
    $(element).addClass('animated zoomOut');
  }

  function replacePage(link) {
    setTimeout(function(){
      window.location = link;
    }, 400);
  }

});
