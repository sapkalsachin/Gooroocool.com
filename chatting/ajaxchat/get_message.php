<?php 
		@session_start();
		if (! isset($_SESSION['username']) && !isset($_SESSION['password'])) {
			echo '<h1>:(</h1><h2>Sorry dear,</h2><h3>please <a href="../../gooroocool">login<a/> to start chatting.</h3>';
		}
		else
		{


	if (isset($_POST['sender']) && isset($_POST['receiver'])) {
		$sender = $_POST["sender"];
		$receiver = $_POST["receiver"];
		require 'db_connect.php';

		$sql_query = "SELECT * FROM chatting where ((sender_id = '$sender') && (receiver_id = '$receiver')) || ((sender_id = '$receiver') && (receiver_id = '$sender')) order by time DESC LIMIT 50";
		$retval = mysqli_query($conn, $sql_query);
		if(mysqli_num_rows($retval) > 0){  
	    while($row = mysqli_fetch_assoc($retval)){ 
	    	if ($row['sender_id'] == $sender) {
	    			?>
					    <li class="self">
					        <div class="avatar"><img src="avatar.png" draggable="false"/></div>
					      <div class="msg">
					        <p>
					        	<?php echo $row["message"]; ?>
					        </p>
					        <time><?php echo $row["time"]; ?></time>
					      </div>
					    </li>
	    			<?php
	    		}
	    	else{
	    			?>
	    				<li class="other">
					        <div class="avatar"><img src="avatar.png" draggable="false"/></div>
					        <div class="msg">
					          <p>
					          	<?php echo $row["message"]; ?>
					          </p>
					          <time><?php echo $row["time"]; ?></time>
					        </div>
					    </li>
	    			<?php
	    		}
	    	?>

	    	<?php
	    }
		if (!$retval) {
			echo "<b>Failed to load messages :( </b>";

		}
	}
}
}
?>