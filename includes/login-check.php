<?php
    require_once 'dbconnect.php';

    if($_SERVER["REQUEST_METHOD"] == "POST"){
      $un = trim($_POST["username"]);
      $pw = trim($_POST["password"]);

      // Checks if user is already registered
      $sql_username = "SELECT * FROM easypc.user WHERE username='$un';";
      $username = $conn->query($sql_username);
      $rows_u = $username->num_rows;
      // Server error checking
      if ($un == "" || $pw == "") {
        echo '{ "result":"empty" }';
      } elseif ($rows_u == 0) {
        // If the user is not registered rows will = 0
        echo '{ "result":"username" }';
      } else {
        if ($conn == true) {
          // Getting password for username specified by user
          $sql_password = "SELECT password FROM easypc.user WHERE username='$un';";
          $result = $conn->query($sql_password);
          $row = mysqli_fetch_row($result);
          $hashed_password = $row[0];

          $q_isAdmin = "SELECT isAdmin FROM easypc.user WHERE username='$un';";
          $adminResult = $conn->query($q_isAdmin);
          $rowAdmin = mysqli_fetch_row($adminResult);
          $isAdmin = $rowAdmin[0];
          // Verify user entered password vs hash password
          if(password_verify($pw, $hashed_password)) {
            if (session_status() == PHP_SESSION_NONE) { session_start(); }
            if ($isAdmin == 'No') {
              $_SESSION['username'] = $un;
            } else {
              $_SESSION['username-admin'] = $un;
            }
            echo '{ "result":"valid" }';
          } else {
            // If the password/hash are not same
            echo '{ "result":"password" }';
          }
        } else {
          // If $conn != true, then DB was not connected to and error is thrown back
          echo '{ "result":"database" }';
        }

      }
    }
    mysqli_close($conn);
