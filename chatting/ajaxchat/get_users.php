<?php 

		@session_start();
		if (! isset($_SESSION['username']) && !isset($_SESSION['password'])) {
			echo '<h1>:(</h1><h2>Sorry dear,</h2><h3>please <a href="../../gooroocool">login<a/> to start chatting.</h3>';
		}
		else
		{
		$username = $_SESSION["username"];
		require_once("../../user_info.php");
		$user_info = get_user_data($username);
 
		require 'db_connect.php';

		$sql_query = "SELECT firstname, lastname, user_id FROM user_info order by firstname";
		$retval = mysqli_query($conn, $sql_query);
		if(mysqli_num_rows($retval) > 0){  

	    while($row = mysqli_fetch_assoc($retval)){
	    		$first_name = $row['firstname']; 
	    		$user_name = $first_name.' '.$row['lastname'];
	    		$user_id = $row['user_id'];
	    	?>
	    	    <div class="user_info" onclick='loadchat(<?php echo $user_info["user_id"]; ?>, "<?php echo $user_id; ?>" , "<?php echo $first_name; ?>")'> 
					      <div id=""><img class="user_pic" src="avatar.png" draggable="false"/></div>
					      <div class="user_details">
					      	<?php 
					      		echo $user_name;
					      	 ?>
					      </div>
				</div>
	    	<?php
	    }
		if (!$retval) {
			echo "<b>Failed to load messages :( </b>";

		}
	}
}
?>