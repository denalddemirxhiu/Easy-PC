<?php
require_once 'dbconnect.php';

if (session_status() == PHP_SESSION_NONE) {session_start();}
if($_SERVER["REQUEST_METHOD"] == "POST"){

  $pwo = trim($_POST['password_o']);
  $pwn = trim($_POST['password_n']);
  $pwc = trim($_POST['password_c']);
  $un = $_SESSION['username'];

  $regexContainsNum = "/\d.*/";
  $regexExclAstr = "/.*[!|\*].*/";
  $regexFirstAlpha = "/^[a-zA-Z].*/";

  $sql_currentPassword = "SELECT password FROM easypc.user WHERE username='$un';";
  $result = $conn->query($sql_currentPassword);
  $row = mysqli_fetch_row($result);
  $hashed_password = $row[0];

  if (!password_verify($pwo, $hashed_password)) {
    echo '{"result":"password_o"}';
  } elseif (!preg_match($regexContainsNum, $pwn) || !preg_match($regexFirstAlpha, $pwn) || !preg_match($regexExclAstr, $pwn)
            || strlen($pwn) < 8 || strlen($pwn) > 16) {
    echo '{"result":"password_n"}';
  } elseif ($pwn != $pwc) {
    echo '{"result":"password_c"}';
  } else {
    if ($conn == true) {
      $hpw = password_hash($pwn, PASSWORD_DEFAULT);
      $sql_update_pw = "UPDATE easypc.user SET password='$hpw' WHERE username='$un';";
      $conn->query($sql_update_pw);
      echo '{"result":"valid"}';
    } else {
      echo '{"result":"database"}';
    }
  }
  mysqli_close($conn);
}
 ?>
