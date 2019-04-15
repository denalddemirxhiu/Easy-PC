<?php

require_once 'dbconnect.php';
if (session_status() == PHP_SESSION_NONE) {session_start();}
if($_SERVER["REQUEST_METHOD"] == "POST"){

  $uno = trim($_POST["username_o"]);
  $unn = trim($_POST["username_n"]);
  $pw = trim($_POST["password"]);
  $sun = $_SESSION['username'];

  $regexFirstAlpha = "/^[a-zA-Z].*/";
  $regexOnlyAlphaNum = "/^\w+$/";
  // Selecting older username to check if it's equal to the logged in user
  $sql_username = "SELECT * FROM easypc.user WHERE username='$uno';";
  $username_o = $conn->query($sql_username);
  $rows_u = $username_o->num_rows;
  // Selecting to see if the new username already exists
  $sql_username_e = "SELECT * FROM easypc.user WHERE username='$unn';";
  $username_e = $conn->query($sql_username_e);
  $rows_e = $username_e->num_rows;
  // Selecting password for validation
  $sql_password = "SELECT password FROM easypc.user WHERE username='$uno';";
  $result = $conn->query($sql_password);
  $row = mysqli_fetch_row($result);
  $hashed_password = $row[0];

  if ($rows_u == 0 || $uno != $sun) {
    echo '{"result":"username_o"}';
  } elseif (!preg_match($regexFirstAlpha, $unn) || !preg_match($regexOnlyAlphaNum, $unn) || $unn == '') {
    echo '{"result":"username_n"}';
  } elseif (!password_verify($pw, $hashed_password)) {
    echo '{"result":"password"}';
  } elseif ($rows_e > 0) {
    echo '{"result":"username_taken"}';
  } else {
    if ($conn == true) {
      $sql_update_un = "UPDATE easypc.user SET username='$unn' WHERE username='$uno';";
      $conn->query($sql_update_un);
      $_SESSION['username'] = $unn;
      echo '{"result":"valid"}';
    } else {
      echo '{"result":"database"}';
    }
  }

  mysqli_close($conn);
}
