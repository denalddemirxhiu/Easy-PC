<?php

require_once 'dbconnect.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){

  if (session_status() == PHP_SESSION_NONE) { session_start(); }
  $st = trim($_POST["street"]);
  $ap = trim($_POST["apartment"]);
  $ci = trim($_POST["city"]);
  $po = trim($_POST["postal"]);
  $co = trim($_POST["country"]);
  $ph = trim($_POST["phone"]);
  $username = $_SESSION["username"];
  // Getting userId of session user. Which is who is logged in
  $sql_id = "SELECT userId FROM easypc.user WHERE username='$username';";
  $result = $conn->query($sql_id);
  $row = mysqli_fetch_row($result);
  $id = $row[0];
  // Checking if there is an address entry for the user already
  $sql_user = "SELECT * FROM easypc.shipping_addr WHERE userId='$id';";
  $result = $conn->query($sql_user);
  $rows = $result->num_rows;

  $regexPostal = '/[ABCEGHJKLMNPRSTVXY][0-9][ABCEGHJKLMNPRSTVWXYZ] ?[0-9][ABCEGHJKLMNPRSTVWXYZ][0-9]/';
  $regexPhone = '/^\(?([0-9]{3})\)?[-.●]?([0-9]{3})[-.●]?([0-9]{4})$/';
  // Server error checking
  if ($ap == "") {
    // So that NULL can be inserted in to the DB
    $ap = NULL;
  }
  if ($st == "" || $ci == "" || $po == "" || $co == "" || $ph == "") {
    echo '{ "result":"empty" }';
  } elseif (!preg_match($regexPostal, $po)) {
    echo '{ "result":"postal" }';
  } elseif (!preg_match($regexPhone, $ph)) {
    echo '{"result":"phone"}';
  } elseif ($rows > 0) {
    // If there is an address already (1 row) then it is updated where userId (fk) matches
    if ($conn == true) {
      $sql_update = "UPDATE easypc.shipping_addr SET street='$st', city='$ci', postal_code='$po',
                    country='$co', apartment='$ap', phone='$ph' WHERE userId='$id';";
      $conn->query($sql_update);
      echo '{ "result":"updated" }';
    } else {
      echo '{ "result":"database" }';
    }


  } else {
    // If there is no address already, one is inserted
    if ($conn == true) {
      $sql_insrt = "INSERT INTO easypc.shipping_addr (street, city, postal_code, country, apartment, phone, userId)
                    VALUES ('$st','$ci','$po','$co','$ap','$ph','$id');";
      $conn->query($sql_insrt);
      echo '{ "result":"added" }';
    }
  }
  mysqli_close($conn);
}
