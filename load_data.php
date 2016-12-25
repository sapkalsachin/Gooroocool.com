<?php
session_start();
  if(!isset($_SESSION['username']) && !isset($_SESSION['password']))
  {
    echo '<h1>Sorry dear :( </h1><h3>You need to <a href="index.php">login</a> first!</h3>';
  } 
  else{
  	$low_lim = 0;
  	$up_lim = 15;
  	load_data($low_lim, $up_lim);
}

function get_user_data($username){
            $db_user = ""; //Database username
            $db_pass = ""; //Database password
            $db_name = ""; //Database name
			$conn = mysqli_connect('localhost','$db_user','$db_pass','$db_name');

	$sql = "SELECT firstname, lastname, class, division FROM user_info where username = '$username'";
	$retval=mysqli_query($conn, $sql);
    
	$row = array(); 
    return(mysqli_fetch_assoc($retval));           
 }
 

function load_data($low_lim, $up_lim){
             $db_user = ""; //Database username
             $db_pass = ""; //Database password
             $db_name = ""; //Database name

	$conn = mysqli_connect('localhost','$db_user','$db_pass','$db_name');
	$query = "SELECT * FROM user_post_upload order by date DESC LIMIT $low_lim, $up_lim";
	$retval=mysqli_query($conn, $query);  
    $check_status = mysqli_affected_rows($conn);
    if(mysqli_num_rows($retval) > 0){  
    while($row = mysqli_fetch_assoc($retval)){ 
 	$data = get_user_data($row['username']);
    if ($row['status'] == null){
    ?>
    	<div class="panel panel-default">
    		<div class="panel-heading dash-nav"> 
    			
    				<?php
    					echo '<a href=""><strong style="font-size : 1.2em">'.$data['firstname']." ".$data['lastname']."</strong></a><i> - uploaded a photo.</i><small class=''>(".$row['date']." )</small>";
    				?>
    			
    		</div>
    		 <div class="panel-body post-bg">
    		  <img alt="No image to display :(" src="<?php echo $row['pic_address']; ?>" class="img-responsive well loaded-img">
    		   <?php
    		 	if ($row['description'] != null) {
    		 		echo '<h4 class="status_output">"'.$row['description'].'"</h4>';
    		 	}
    		 ?>
    		 </div>


    		

    		 <div class="panel-footer">
                    <a href="#" style="color:red;">Like <span class="glyphicon glyphicon-heart"></span></a>
        		 </div>
    	</div>
    <?php }
    if ($row['status'] != null){
    	?>
    		<div class="panel panel-default">
    		<div class="panel-heading"> 
    			
    				<?php
    				echo '<a href=""><strong style="font-size : 1.2em">'.$data['firstname']." ".$data['lastname']."</strong></a><i> - updated status <small class=''>(".$row['date']." )</small>";
    				?>
    			
    		</div>
    		 <div class="panel-body post-bg">
    		  <h4 class="status_output">"<?php echo $row['status']; ?>"</h4>
    		 </div>
    		 <div class="panel-footer">
                    <a href="#" style="color:red;">Like <span class="glyphicon glyphicon-heart"></span></a>
    		 </div>
    	</div>
    	<?php
    }
 }
}else{  
echo "No recent activities on this group"; }


}


?>