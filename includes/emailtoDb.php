<?php
  require_once 'dbconnect.php';

  if(session_status() == PHP_SESSION_NONE) {session_start();}
  if($_SERVER["REQUEST_METHOD"] == "POST") {

    $emo = trim($_POST["email_o"]);
    $emn = trim($_POST["email_n"]);
    $pw = trim($_POST["password"]);
    $un = trim($_SESSION["username"]);

    $regexEmail = "/^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!\.)){0,61}[a-zA-Z0-9]?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!$)){0,61}[a-zA-Z0-9]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/";

    $query_password = "SELECT password FROM easypc.user WHERE username='$un';";
    $result = $conn->query($query_password);
    $row = mysqli_fetch_row($result);
    $hashed_password = $row[0];

    $query_email = "SELECT email FROM easypc.user WHERE username='$un';";
    $result = $conn->query($query_email);
    $row = mysqli_fetch_row($result);
    $dbEmail = $row[0];

    if(!preg_match($regexEmail, $emo) || strlen($emo) == 0 || $dbEmail != $emo) {
      echo '{"result":"email_o"}';
    } elseif (!preg_match($regexEmail, $emn) || strlen($emn) == 0) {
      echo '{"result":"email_n"}';
    } elseif (!password_verify($pw, $hashed_password)) {
      echo '{"result":"password"}';
    } else {
      if ($conn == true) {
        $query_update_email = "UPDATE easypc.user SET email='$emn' WHERE username='$un';";
        $conn->query($query_update_email);
        echo '{"result":"valid"}';
      } else {
        echo '{"result":"database"}';
      }
    }
    mysqli_close($conn);
  }
 ?>
