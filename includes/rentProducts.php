<?php
  require_once "dbconnect.php";
  require_once "freedata.php";

  function rent($id, $conn) {
    $query = "UPDATE assets SET available = 0 WHERE productId = $id;";

    $result = mysqli_query($conn, $query) or die("Something wrong happened!");
  }

  if(session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  $json = json_decode($_GET['weeks'], true);

  $dbc = mysqli_select_db($conn, 'EasyPc');
  $user = $_SESSION['username'];
  $userId = "";
  $productId = "";
  $today = date("Y-m-d");
  $sql = "SELECT userId FROM user WHERE username = '$user';";

  $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result)) {
    while($row = mysqli_fetch_assoc($result)) {
      $userId = $row['userId'];
    }

    foreach ($_SESSION['cart'] as $item => $value) {
      $productId = $_SESSION['cart'][$item];

      $numWeeks = $json["$productId"];
      $retDate = date('Y-m-d', strtotime("+$numWeeks weeks"));

      $sql = 'INSERT INTO Rentals VALUES '.'('."NULL, $userId, $productId, STR_TO_DATE('$today', '%Y-%m-%d'), STR_TO_DATE('$retDate', '%Y-%m-%d'));";

      $result = mysqli_query($conn, $sql);

      if($result) {
        rent($productId, $conn);
        removeFromCart($productId);
      } else {
        echo "Problem renting";
      }
    }
  }

  mysqli_close($conn);

 ?>
