<?php
  session_start();
  $servername = "hms.local"; //change this  accordingly
  $dBUsername = "root";
  $dBPassword = "";
  $dBName = "hostel_management_system";
 // session_start();
  $conn=mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

  if (!$conn) {
    die("Connection Failed: ".mysqli_connect_error());
  }
?>
