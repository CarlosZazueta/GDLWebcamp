<?php
  $host = "localhost";
  $user = "root";
  $pass = "root";
  $dbname = "gdlwebcamp";

  $conn = new mysqli($host, $user, $pass, $dbname);

  if ($conn->connect_error) {
    echo $error -> $conn->connect_error;
  }
?>
