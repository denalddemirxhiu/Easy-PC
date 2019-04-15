<?php
  if (session_status() == PHP_SESSION_NONE) {session_start();}

  if (!isset($_SESSION['username-admin'])) {
    header('Location: http://localhost/easy-pc/index.php');
    exit;
  }
 ?>
