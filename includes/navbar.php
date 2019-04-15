<!-- Nav Bar Include -->
<link rel="stylesheet" href="http://localhost/easy-pc/css/navbar.css">
<header>
  <div class="logo">
    <a href="index.php">
      <img src="images/Logo.png" alt="Easy PC">
    </a>
  </div>
  <div class="navbar">
    <nav>
      <ul id="nav-ul">
        <?php include "loggedin.php" ?>
      </ul>
    </nav>
  </div>
<?php
  if (session_status() == PHP_SESSION_NONE) {session_start();}
  if(isset($_SESSION['username'])) {
    echo '<div id="cart-container" class="cart-container"><a href="cart.php"><img src="images/cart.png" class="cart-image"></a></div>
      <div id="added-toast" class="added-toast">The item has been added!</div>
      <div class="logged-as-container">
      <p class="logged-as-dialog">'.$_SESSION['username'].'</p>
      <a class="logout-text" href="loggedout.php">logout</a>
      </div>';
  } elseif (isset($_SESSION['username-admin'])) {
    echo '<div class="logged-as-container">
      <p class="logged-as-dialog">'.$_SESSION['username-admin'].' (Admin)'.'</p>
      <a class="logout-text" href="loggedout.php">logout</a>
      </div>';
  }
?>
</header>
