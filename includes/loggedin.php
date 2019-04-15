<!-- Changes nav bar links if a user is logged in -->
<?php
  if (session_status() == PHP_SESSION_NONE) { session_start(); }

  if(isset($_SESSION['username'])) {
    echo '<li id="nav-li"> <a style="font-size: 1.0em" id="nav-a" href="index.php">Home</a> </li>';
    echo '<li id="nav-li"> <a style="font-size: 1.0em" id="nav-a" href="information.php">Information</a> </li>';
    echo '<li id="nav-li"> <a style="font-size: 1.0em" id="nav-a" href="products.php">Products</a> </li>';
    echo '<li id="nav-li"> <a style="font-size: 1.0em" id="nav-a" href="aboutus.php">About Us</a> </li>';
    echo '<li id="nav-li"> <a style="font-size: 1.0em" href="feedback_form.php">Feedback</a> </li>';
    echo '<li id="nav-li"> <a style="font-size: 1.0em" href="account_management.php">Account</a> </li>';
  } elseif (isset($_SESSION['username-admin'])) {
    echo '<li id="nav-li"> <a style="font-size: 1.0em" id="nav-a" href="index.php">Home</a> </li>';
    echo '<li id="nav-li"> <a style="font-size: 1.0em" id="nav-a" href="information.php">Information</a> </li>';
    echo '<li id="nav-li"> <a style="font-size: 1.0em" id="nav-a" href="aboutus.php">About Us</a> </li>';
    echo '<li id="nav-li"> <a style="font-size: 1.0em" href="product_remove.php">Remove Products</a> </li>';
  } else {
    echo '<li id="nav-li"> <a style="font-size: 1.0em" id="nav-a" href="index.php">Home</a> </li>';
    echo '<li id="nav-li"> <a style="font-size: 1.0em" id="nav-a" href="information.php">Information</a> </li>';
    echo '<li id="nav-li"> <a style="font-size: 1.0em" id="nav-a" href="products.php">Products</a> </li>';
    echo '<li id="nav-li"> <a style="font-size: 1.0em" id="nav-a" href="aboutus.php">About Us</a> </li>';
    echo '<li id="nav-li"> <a style="font-size: 1.0em" href="login.php">Login</a> </li>';
  }

 ?>
