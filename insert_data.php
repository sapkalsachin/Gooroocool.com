<?php 
	session_start();
  if(!isset($_SESSION['username']) && !isset($_SESSION['password']))
  {
    echo '<h1>Sorry dear :( </h1><h3>You need to <a href="index.php">login</a> first!</h3>';
  } 
   

	elseif (isset($_POST['status_input'])) {
			 $db_user = ""; //Database username
             $db_pass = ""; //Database password
             $db_name = ""; //Database name
		$conn = mysqli_connect('localhost', '$db_user', '$db_pass','$db_name');
                    if(! $conn)
                    {
                        die('Connectoin failed'. mysql_error());
                    }   

	$status_input = $_POST['status_input'];

	if (!strlen($status_input)) {
	echo '<div class="alert alert-info alert-dismissable">    <button type="button" class="close" data-dismiss="alert"        aria-hidden="true">       &times;    </button>Status cannot be blank !   </div>';
		die();

	}

	$username = $_SESSION['username'];///////////////////////////////////////////////////////////////////////////////////// 
	$insert_query = "INSERT INTO user_post_upload (status,username,date) VALUES('$status_input','$username',now())";
	$result = mysqli_query($conn,$insert_query);
	if($result)
	{
	echo '<div class="alert alert-success alert-dismissable">    <button type="button" class="close" data-dismiss="alert"        aria-hidden="true">       &times;    </button>Successfully updated status !   </div>';
	}
	else
		{
			echo '<div class="alert alert-danger alert-dismissable">    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times;
			    </button> Unable to update status now. Please try again...   </div>';

		}
	}
	else{
			echo '<div class="alert alert-danger alert-dismissable">    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times;
			    </button> Status can not be blank... </div>';
			die();
	}
	
 ?>