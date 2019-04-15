<?php
  require_once 'dbconnect.php';
  if (session_status() == PHP_SESSION_NONE) {session_start();}

  if($_SERVER["REQUEST_METHOD"] == "POST"){
      $contact = trim($_POST['contact']);
      $issue = trim($_POST['issue']);
      $comment = trim($_POST['comment']);
      $username = trim($_SESSION['username']);

      if ($contact == NULL) {
        echo '{"result":"contact"}';
      } elseif ($issue == '--Select--') {
        echo '{"result":"issue"}';
      } elseif (strlen($comment) == 0) {
        echo '{"result":"comment"}';
      } else {
        if ($conn == true) {
          $q_userId = "SELECT userId from easypc.user WHERE username='$username';";
          $result = $conn->query($q_userId);
          $row = mysqli_fetch_row($result);
          $userId = $row[0];

          $q_insertFeedback = "INSERT INTO easypc.feedback (contactMethod, issueType, comment, userId)
                                VALUES ('$contact','$issue','$comment','$userId');";
          $conn->query($q_insertFeedback);

          echo '{"result":"valid"}';
        } else {
          echo '{"result":"database"}';
        }
      }

      mysqli_close($conn);
  }

 ?>
