<?php

require_once 'dbconnect.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $fn = trim($_POST["firstname"]);
  $ln = trim($_POST["lastname"]);
  $un = trim($_POST["username"]);
  $pw = trim($_POST["password"]);
  $em = trim($_POST["email"]);

  // Select for email
  $sql_email = "SELECT * FROM easypc.user WHERE email='$em';";
  $email = $conn->query($sql_email);
  $rows_e = $email->num_rows;
  // Select for username
  $sql_username = "SELECT * FROM easypc.user WHERE username='$un';";
  $username = $conn->query($sql_username);
  $rows_u = $username->num_rows;

  // Not checking each one indavidually. Check JS code to see how I did it indavidually
  if ($fn == "" || $ln == "" || $un == "" || $pw == "" || $em == "" || !preg_match("/^[A-z]+$/", $fn) ||
      !preg_match("/^[A-z]+$/", $ln) || !preg_match("/^[a-zA-Z].*/", $un) || !preg_match("/^\w+$/", $un) ||
      !preg_match("/.*[!|\*].*/", $pw) || !preg_match("/^[a-zA-Z].*/", $pw) || !preg_match("/\d.*/", $pw) ||
      !filter_var($em, FILTER_VALIDATE_EMAIL)) {
    // Echoing JSON object with result for displaying
    echo '{ "result":"invalid" }';
  } elseif ($rows_e > 0) {
    echo '{ "result":"email-invalid" }';
  } elseif ($rows_u > 0) {
    echo '{ "result":"username-invalid" }';
  } else {
    // Hashing password before inserting to DB
    if ($conn == true) {
      $hpw = password_hash($pw, PASSWORD_DEFAULT);

      $sql_insrt = "INSERT INTO easypc.user (firstName, lastName, username, password, email)
                    VALUES ('$fn','$ln','$un','$hpw','$em');";
      if (session_status() == PHP_SESSION_NONE) {
        session_start();
        $_SESSION['username'] = $un;
        $conn->query($sql_insrt);
        echo '{ "result":"valid" }';
      }
    } else {
      echo '{"result":"database"}';
    }
  }

  mysqli_close($conn);
}
