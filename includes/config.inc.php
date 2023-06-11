<?php
  session_start();
  
  // Define the duration of inactivity after which the session should end
  $inactive = 1800; // 30 minutes in seconds

  // Check if the "timeout" variable has been set in the session
  if (isset($_SESSION['timeout'])) {
    // Calculate the session's "lifetime" by subtracting the current time from the "timeout"
    $session_life = time() - $_SESSION['timeout'];
	
	// If the "lifetime" exceeds the defined period of inactivity, end the session
	if ($session_life > $inactive) {
		session_unset();
		session_destroy();
		header("Location: index.php?session=expired"); // Redirect to login page

		exit();
	}	
	
  }

  // Update the "timeout" with the current time
  $_SESSION['timeout'] = time();
  
  
  $servername = "hms.test"; //change this  accordingly
  $dBUsername = "root";
  $dBPassword = "";
  $dBName = "hostel_management_system";
 // session_start();
  $conn=mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

  if (!$conn) {
    die("Connection Failed: ".mysqli_connect_error());
  }
?>
