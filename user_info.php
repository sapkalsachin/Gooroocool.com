<?php
	function get_user_data($username){
		 	$db_user = ""; //Database username
            $db_pass = ""; //Database password
            $db_name = ""; //Database name
			$conn = mysqli_connect('localhost','$db_user','$db_pass','$db_name');

	$sql = "SELECT user_id,firstname, lastname, class, division FROM user_info where username = '$username'";
	$retval=mysqli_query($conn, $sql); 
	$row = mysqli_fetch_assoc($retval);
		/*@session_start();
	$_SESSION['username']=$username;
	$_SESSION['firstname']=$row['firstname'];
	$_SESSION['lastname']=$row['lastname'];
	$_SESSION['class']=$row['class'];
	$_SESSION['division']=$row['division'];
	$_SESSION['college']=$row['college'];
	$_SESSION['branch']=$row['branch'];
	$_SESSION['dob']=$row['dob'];
	session_destroy();      */
	return($row);       
 
 } 


?>