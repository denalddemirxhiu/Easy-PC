<?php

// Remove special characters in case of an injection

  function filter_data($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = removeSpecial($data);
    return $data;
  }

  function removeSpecial($z){
    $z = strtolower($z);
    $z = preg_replace('/[^a-z0-9 -]+/', '', $z);
    $z = str_replace('-', '', $z);
    $z = trim($z, ' ');
    return $z;
  }
?>
