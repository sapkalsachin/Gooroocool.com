<?php
session_start();
  
  if(!isset($_SESSION['username']) && !isset($_SESSION['password']))
  {
    echo '<h1>Sorry dear :( </h1><h3>You need to <a href="index.php">login</a> first!</h3>';
    die();
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
	$query = "SELECT * FROM blogs order by time DESC LIMIT $low_lim, $up_lim";
	$retval=mysqli_query($conn, $query);  
    $check_status = mysqli_affected_rows($conn);
    if($check_status){  
    while($row = mysqli_fetch_assoc($retval)){ 
 	$data = get_user_data($row['username']);
    if ($data['firstname']) {
        ?>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div  id="new_post">               
                    <p>
                        <strong id="blog-title"><?php echo $row['blog_title'];?></strong>
                        <br>                       
                        <i class="pull-right">By <?php echo $data['firstname']." ".$data['lastname']."</b> on ".$row['time'];
                             if ($_SESSION['username'] == $row['username']) {
                                echo '<a href="#">[Edit]</a>';
                            }

                         ?></i>
                        <hr>
                    </p>
                    <div class="well" style="background-color:#e0e0eb;">
                    <p id="blog-description">
                        " <?php echo $row['blog_description']; ?> "
                    </p>
                    </div>
                    <div id="show-content-div">
                    <div class="well" style="background-color:#e0e0eb;">
                    <p id="show_content">
                        <?php echo $row['blog_content']; ?> 
                    </p></div></div>
                </div></div>
            </div>
        <?php
    }
    }
 }

}


?>