<?php
  //CREATE CONNECTION
  $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

  //CHECK CONNECTION
  if (mysqli_connect_errno()) {
    //CONNECTION FAILED
    echo "Failed to connect to Mysql". mysqli_connect_errno();
  }
?>
