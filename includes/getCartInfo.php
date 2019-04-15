<?php
  require_once "dbconnect.php";

  if(session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  $obj = array();
  $count = 0;
  $query = "";
  if(empty($_SESSION['cart'])) {
    $obj[0] = new stdClass();
    $obj[0] -> product_name = 'empty';
  } else {
    $sql = "SELECT * FROM assets WHERE productId IN ";
    $sql .= "(";
    $dbc = mysqli_select_db($conn, "EasyPc");


    foreach ($_SESSION['cart'] as $item => $id) {
      $query .= "$id,";
    }

    $sql .= substr($query, 0, -1).");";


    $result = mysqli_query($conn, $sql) or die("Couldn't perform query!");

    if(!mysqli_num_rows($result)) {
      $obj[0] = new stdClass();
      $obj[0] -> product_name = 'empty';
    } else {
      while($row = mysqli_fetch_assoc($result)) {
          $obj[$count] = $row;
          $count++;
      }
    }
  }

  $jsonObj = json_encode($obj);

  echo $jsonObj;

 ?>
