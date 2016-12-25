<?php
session_start();
  if(!isset($_SESSION['username']) && !isset($_SESSION['password']))
  {
    echo '<h1>Sorry dear :( </h1><h3>You need to <a href="index.php">login</a> first!</h3>';
  } 
  else{
if(is_array($_FILES)) {
if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {



        function random_string($length) {
            $key = '';
            $keys = array_merge(range(0, 9), range('a', 'z'));

            for ($i = 0; $i < $length; $i++) {
                $key .= $keys[array_rand($keys)];
            }

            return $key;
        }



            $errors  = array();
            $description = $_POST['description'];
            $description = mysql_real_escape_string($description);
            $allowed_ext = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['userImage']['name'];
            $file_ext = strtolower(end(explode('.', $file_name)));
            $file_size = $_FILES['userImage']['size'];
            $file_tmp = $_FILES['userImage']['tmp_name'];
            $targetPath ='images/'.$file_name;
            $newname = 'images/'.random_string(40).".".$file_ext;
            echo $file_size."<br>";
            echo $file_ext;
            $pass = 1;
if (in_array($file_ext, $allowed_ext) === false) {
    $pass = 0;
}

elseif ($file_size > 5242880) {
    $pass = 0;
}

elseif ($pass) {

    if (move_uploaded_file($file_tmp, $targetPath)) {
        if(rename($targetPath, $newname))
        {
       
                $db_user = ""; //Database username
                $db_pass = ""; //Database password
                $db_name = ""; //Database name

                $username = $_SESSION['username'];
                $conn = mysqli_connect('localhost','$db_user','$db_pass','$db_name');
                $sq = "INSERT INTO user_post_upload (id, pic_address, likes, description, username) VALUES (NULL, '$newname', 0, '$description', '$username')";
               $check = mysqli_query($conn,$sq);
                    if(! $check)
                    {
                        echo "something went wrong";
                        echo "<br>err : ".mysqli_error($conn);
                        echo "".mysql_error();
                    }else{
                         ?>
                        <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Succeed :)</h4>
                        </div>
                  
                        <div class="modal-body">
                            <img src="<?php echo $newname; ?>" height="400px" width="400px" class="img-responsive well" />        
                        </div>

                        <p class="description">
<?php
        
        echo $description;
 ?></p>
    <?php       

                    }

    }
    else
    {
        echo "something went wrong";
    }
    
}}else
{ ?>
                        <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Failed :( </h4>
                        </div>
                  
                        <div class="modal-body">
                            <h5 class="text-danger" style="color:red;">Only .JPG .JPEG .PNG .GIF formats are allowed.</h5>
                            <h5 class="text-danger">File size must be less than 2MB.</h5>        
                        </div>

                        
<?php


 }}
else
        {   ?>
                <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Failed :( </h4>
                        </div>
                  
                        <div class="modal-body">
                            <h5 class="text-danger" style="color:red;">Only .JPG .JPEG .PNG .GIF formats are allowed.</h5>
                            <h5 class="text-danger">File size must be less than 2MB.</h5>
                                    
                        </div>
            <?php
        }
}
}
  ?>