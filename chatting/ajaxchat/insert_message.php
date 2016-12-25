<?php
	
		@session_start();
		if (! isset($_SESSION['username']) && !isset($_SESSION['password'])) {
			echo '<h2>Sorry dear,</h2><br><h3>please <a href="localhost/gooroocool">login<a/> to start chatting.</h3>';
		}
		else
		{
			$sender = $_POST["sender"];
			$receiver = $_POST["receiver"];
			$message = $_POST["message"];
			$message = htmlentities($message);
			$message = addslashes($message);
			echo "Sender : ".$sender."<br>receiver: ".$receiver."<br>Message: ".$message;
			require 'db_connect.php';

			$sql_query = "INSERT INTO chatting (sender_id, receiver_id, message, time)".
				" VALUES".
				" ('$sender', '$receiver', '$message', now())";
			$retval = mysqli_query($conn, $sql_query);

			if ($retval) {
				//echo "Successfully inserted data";
			}
		}
?>