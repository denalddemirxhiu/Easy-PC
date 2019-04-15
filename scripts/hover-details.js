// Function to display form details on hover for ?
// Included in Shipping address and signup
$( document ).ready(function() {
  $('#question-mark').mouseenter(function() {
    $('#hover-tile').fadeIn(200, function() { });
  })
  $('#question-mark').mouseleave(function() {
    $('#hover-tile').fadeOut(200, function() { });
  })
})
