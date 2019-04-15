window.onload = getItems;

function getItems(){
    event.preventDefault();

    var input = $('#search-box').val();

    var dataString = "input=" + input;

    $("#items").addClass("darkTable");

    $.ajax({
      type: "GET",
      url: "http://localhost/easy-pc/includes/searchProducts.php",
      data: dataString,
      success: function(data)
      {
          var jsonRet = JSON.parse(data);


          if(jsonRet.length == 1) {
            $(".printedItems").html("<p> There are no such products currently available! </p>");
          } else if (jsonRet[jsonRet.length-1].loggedin == 'false') {
              $(".printedItems").html("<table id='items' class='darkTable'> </table>");
              $("#items").html("<tr> <th> Product Name </th> <th> Description </th> <th> Rent Price </th></tr>");
            for(var i = 0; i < jsonRet.length-1; i++) {
              $("#items").append(
                "<tr> <td>" + jsonRet[i].product_name +
                "</td> <td>" + jsonRet[i].description +
                "</td> <td> $" + jsonRet[i].rent_price +
                "/week</td> </tr>"
              );
            }
          } else {
              $(".printedItems").html("<table id='items' class='darkTable'> </table>");
              $("#items").html("<tr> <th> Product Name </th> <th> Description </th> <th> Rent Price </th> <th> Add to Cart </th></tr>");
            for(var i = 0; i < jsonRet.length-1; i++) {
              var button;

              if(jsonRet[i].available == 1) {
                button = "<button id='"+ jsonRet[i].productId +"' class='add-to-cart' onclick='addToCart(this.id)'> add to cart </button>";
              } else {
                button = "<button class='add-to-cart-na'> add to cart </button> <div class='not-avail'> This product is currently not available! </div> ";
              }

              $("#items").append(
                '<tr> <td class="item-name">' + jsonRet[i].product_name +
                "</td> <td>" + jsonRet[i].description +
                "</td> <td> $" + jsonRet[i].rent_price +
                "/week</td> <td>" + button + " </td></tr>"
              );
            }

          }
      }
    });
}

function addToCart(item) {
  $.get("http://localhost/easy-pc/includes/addToCart.php?id="+item);
  toast();
  return false;
}

function toast() {
  $("#added-toast").css({'visibility':'visible', '-webkit-animation-duration':'0.2s'});
  $("#added-toast").addClass('animated fadeIn');
  setTimeout(function(){
      $("#added-toast").css({'visibility':'hidden'});
	}, 2000);
}
