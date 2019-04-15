
<?php
  require_once 'dbconnect.php';
  require_once 'filter_input.php';

  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  $query = "";
  $dbc = mysqli_select_db( $conn , 'EasyPc' );

  if (isset($_GET['input'])) {
    $search = $_GET['input'];
    $search = filter_data($search);

    if ($search == "") {
      $query = "SELECT * FROM assets;";
    } else {
      $query = "SELECT * FROM assets WHERE product_name LIKE '%$search%';";
    }
  } else {
    $query = "SELECT * FROM assets;";
  }

    $result = mysqli_query($conn, $query) or die('Could not query!');

    $obj = array();

    $index = 0;

    while($row = mysqli_fetch_assoc($result)) {
      $obj[$index] = $row;
      $index++;
    }

    //Checking if the query returned no results
    //therefore no content needs to be displayed
    if(empty($obj)) {
      $obj[0] = new stdClass();
      $obj[0] -> product_name = 'empty';
    }

    if(isset($_SESSION['username']) || isset($_SESSION['username-admin']))
    {
      $obj[$index] = new stdClass();
      $obj[$index] -> loggedin = 'true';
    } else {
      $obj[$index] = new stdClass();
      $obj[$index] -> loggedin = 'false';
    }

    $jsonObj = json_encode($obj);

    echo $jsonObj;

    mysqli_close($conn);

 ?>
