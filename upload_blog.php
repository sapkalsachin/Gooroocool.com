<?php 

	if (isset($_POST['submit'])) {
                        new_post();
                }	
        else
        {
                echo "<h2>Sorry dear you don't have permissions to view this page.</h2>";
                echo '<br><h3><a href="index.php">Visit Login page.</a></h3>';
        }           

function new_post()
        {

                if (isset($_POST['title'])) {
                        @session_start();
                        $title = $_POST['title'];
                        if (empty($title)) {
                                $title_err = 'Please select a title for your post.';
                        }
                        $description = $_POST['description'];
                        $content = $_POST['content'];
                        $username = $_SESSION['username'];

        $db_user = ""; //Database username
        $db_pass = ""; //Database password
        $db_name = ""; //Database name


                        $conn = mysqli_connect('localhost','$db_user','$db_pass','$db_name');
                if ($conn) {
                        echo "connection successfull";
                }
               
                                $insert_query = "INSERT INTO blogs (blog_title, blog_description, blog_content, username, time) VALUES('$title','$description','$content','$username', now())";
                $check = mysqli_query($conn , $insert_query);
                if ($check) {
                        header('location: blogging.php');
                }
                else
                {
                        echo "Failed to upload data. <br>";
                }
        }


        }

            
?>