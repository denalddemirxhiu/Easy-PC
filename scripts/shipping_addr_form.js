$("document").ready(function () {
  $("#cancel-btn").click(function() {
    $("#ship-addr-tile").addClass("animated zoomOut")
    setTimeout(function(){
      window.location.replace("account_management.php");
    }, 400);
  });
});

function submitAddress () {
  event.preventDefault();
  // console.log("Function called");
  var street = $("#street").val();
  var apartment = $("#apartment").val();
  var city = $("#city").val();
  var postal = $("#postal").val().toUpperCase();
  var country = $("#country").val();
  var phone = $("#phone").val();

  var regexPostal = /[ABCEGHJKLMNPRSTVXY][0-9][ABCEGHJKLMNPRSTVWXYZ] ?[0-9][ABCEGHJKLMNPRSTVWXYZ][0-9]/;
  var regexOnlyAlphaNum = /^[a-zA-Z0-9 ]+$/;
  var regexPhone = /^\(?([0-9]{3})\)?[-.●]?([0-9]{3})[-.●]?([0-9]{4})$/;

  var st = ap = ci = po = co = ph = true;

  $("#street-error").css({visibility: "hidden"});
  $("#city-error").css({visibility: "hidden"});
  $("#postal-error").css({visibility: "hidden"});
  $("#country-error").css({visibility: "hidden"});
  $("#apartment-error").css({visibility: "hidden"});
  $("#phone-error").css({visibility: "hidden"});

  $("#street").removeClass('box-shadow-inset');
  $("#city").removeClass('box-shadow-inset');
  $("#postal").removeClass('box-shadow-inset');
  $("#country").removeClass('box-shadow-inset');
  $("#apartment").removeClass('box-shadow-inset');
  $("#phone").removeClass('box-shadow-inset');

  $("#server-error").css({display: "none"});

  if (apartment.length == 0) {
    apartment = ""
  }

  if (street.length < 1 || !regexOnlyAlphaNum.test(street)) {
    $("#street").addClass('box-shadow-inset');
    $("#street-error").css({visibility: "visible"});
    st = false;
  } if (city.length < 1 || !regexOnlyAlphaNum.test(city)) {
    // console.log("City failed");
    $("#city").addClass('box-shadow-inset');
    $("#city-error").css({visibility: "visible"});
    ci = false;
  } if (postal.length < 1 || !regexOnlyAlphaNum.test(postal) || !regexPostal.test(postal)) {
    $("#postal").addClass('box-shadow-inset');
    $("#postal-error").css({visibility: "visible"});
    // console.log("Postal failed");
    ci = false;
  } if (country.length < 1 || !regexOnlyAlphaNum.test(country)) {
    $("#country").addClass('box-shadow-inset');
    $("#country-error").css({visibility: "visible"});
    // console.log("Country Failed");
    po = false;
  } if (apartment.length > 0 && !regexOnlyAlphaNum.test(apartment)) {
    $("#apartment").addClass('box-shadow-inset');
    $("#apartment-error").css({visibility: "visible"});
    // console.log("Country Failed");
    po = false;
  } if (phone.length < 1 || !regexPhone.test(phone)) {
    $("#phone").addClass('box-shadow-inset');
    $("#phone-error").css({visibility: "visible"});
    ph = false;
  }

  if (st && ap && ci && po && co && ph) {
    // console.log("made it to ajax");
    var dataString = 'street=' + street + '&apartment=' + apartment + '&city=' + city
                      + '&postal=' + postal + "&country=" + country + "&phone=" + phone;

    var url = "http://localhost/easy-pc/includes/addrtoDB.php";

    $.ajax({
      type: "POST",
      url: url,
      data: dataString,
      datatype: "json",
      error: function(data) {
        console.log(data);
      },
      success: function(data){
        var data = JSON.parse(data);
        // Setting errors based on what's passed back from server validation
        // console.log(data.result);
          if (data.result == 'empty') {
            $("#server-error-prompt").html('<p id="server-error">Server rejected form - Please fill out all of the required fields</p>');
          } else if (data.result == 'postal') {
            $("#server-error-prompt").html('<p id="server-error">Server rejected form - Please fill out the postal code accordingly</p>');
          } else if (data.result == 'phone') {
            $("#server-error-prompt").html('<p id="server-error">Server rejected form - Please fill out the phone # accordingly</p>');
          } else if (data.result == 'database') {
            $("#server-error-prompt").html('<p id="server-error">Could not connect to database</p>');
          } else if(data.result == 'updated' || data.result == 'added'){
            // Confirming address has been added
            $("#ship-addr-tile").addClass('animated zoomOut');
            setTimeout(function(){
              window.location.replace("account_updated.php");
            }, 400);
          }
        }
    })
  }

}
