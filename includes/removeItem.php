<?php

  require_once "dbconnect.php";
  $item;
  $dbc = mysqli_select_db ( $conn , 'EasyPc' );

  if(session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  if(isset($_GET['id'])) {
    $item = $_GET['id'];

    $sql = "DELETE FROM assets WHERE productId = $item;";

    $result = mysqli_query($conn, $sql) or die("Couldn't query!");
  }


 ?>
