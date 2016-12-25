<?php
		$server = "localhost";
		$user = "";		// Database username 
		$password = ""; // Database password
		$db = "";		// Database name
	global $conn;
	$conn = mysqli_connect($server, $user, $password, $db);
	if (!$conn) {
		echo "Error in database connection";
	}

?>