<?php

  require_once "dbconnect.php";


  if(session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  if(isset($_GET['id'])) {
    $id = $_GET['id'];
    removeFromCart($id);
  }

  function freeData() {
    foreach ($_SESSION['cart'] as $item => $value) {
      unset($_SESSION['cart'][$item]);
    }
  }

  function removeFromCart($id) {
    unset($_SESSION['cart'][$id]);
    return true;
  }

 ?>
