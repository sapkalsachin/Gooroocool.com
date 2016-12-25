<!DOCTYPE html>
<html>
<head>
  <title>SignUp | gooroocool</title>
                   <style type="text/css">
                       .error {color: #FF0000;}
                    </style>
                     <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/custom.css">

                      
    </head>
    <body class="jumbotron" style="background-image:url(img/backgrounds/formbg.jpg); background-position:fixed; background-repeat:no-repet;">
    <div class="section" style="height:4em">
            <nav class="navbar navbar-fixed-top navbar-dark dash-nav bg-default" role="navigation">   
            <div class="navbar-header">  
                <a href="index.php"><h2 style="color:red; font-family:elephant;"><center>gooroocool.com</center></h2></a>
            </div> 
                
        </nav>
        </div> 
        
        <!--DATABASE CONNECTION-->
        
        <?php
                $email_err = $pass_err = '';

            $db_user = ""; //Database username
            $db_pass = ""; //Database password
            $db_name = ""; //Database name

         $conn = mysqli_connect('localhost', '$db_user', '$db_pass','$db_name');
        if(! $conn)
        {
            die('Connectoin failed'. mysqli_error());
        }
        $error = array();
    //INSERTION INTO TABLE
            if(isset($_POST['submit']))
    { 
     {

         $firstname= addslashes($_POST['firstname']);
         $lastname = addslashes($_POST['lastname']);  
         $password = addslashes($_POST['password']);
         $password = sha1($password, TRUE);
         if(strlen($password)< 6)
         {
            $pass_err = 'Password is too short';
         } 
         $dob = addslashes($_POST['dob']);
         $college = addslashes($_POST['college']);
         $class = addslashes($_POST['class']);
         $division = addslashes($_POST['division']);
         $branch = addslashes($_POST['branch']);
         $email = addslashes($_POST['email']);
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $email_err = 'Invalid email id';
          }
   
              $sql = "SELECT * FROM user_info WHERE username = '$email'";
            
                     
                     $row_count = mysqli_query($conn, $sql);
       
                if ($row_count != null) {
                  die('<div class="alert alert-danger alert-dismissable">    <button type="button" class="close" data-dismiss="alert"        aria-hidden="true">       &times;    </button><h3>Cant register with this emial id. Please try again with another one ! </h3>  </div>');   
                   echo "GO back to <a href='index.php'>home</a>";
                }
                else{
                 $sql = "INSERT INTO user_info". 
                 "(firstname,lastname,username,password,dob,college,class,branch,division) ". 
                 "VALUES ". 
                 "('$firstname','$lastname','$email','$password','$dob','$college','$class','$branch','$division')";
            
                     
                     $retval = mysqli_query($conn, $sql);
                     
                     if(! $retval ) 
                     { 
                         die('Could not enter data: ' . mysql_error()); 
                     } 
                    else{
                        echo '<div class="alert alert-info alert-dismissable">    <button type="button" class="close" data-dismiss="alert"        aria-hidden="true">       &times;    </button>Registered successfully !   </div>';
                        echo "<br><i>Returning to homepage.</i>";
            echo '<script>setTimeout(function () { window.location.href = "index.php";}, 2000);</script>';
                            die();

                        }
             
        mysqli_close($conn);
             }
    }}
       function test_input($data) {
  $data = trim($data);
  $data = addslashes($data);
  $data = htmlspecialchars($data);
  return $data;

}

        ?>
        <div class="container-fluid col-md-offset-3 col-md-6 col-sm-12 jumbotron well" style="background-color: white  ; opacity:0.8;">
 

                        <form method="post" action="<?php $PHP_SELF?>">
                            <br/>
                            <div class="form-horizontal">
                            <div class="form-group">
                                        <div class="col-md-12">
                                        <h4>Firstname :- </h4>
                                            <input class="form-control" required type="text" name="firstname" placeholder="Firstname">
                                        </div>
                                        </div>
                            <div class="form-group">
                            <div class="col-md-12">
                            <h4>Lastname :- </h4>
                                <input class="form-control" required type="text" name="lastname" placeholder="lastname">
                            </div>
                            </div>
<small style="color:green">Note: Your name and surname will be displayed as it is.</small>
                            <div class="form-group">
                            <div class="col-md-12">
                            <h4>Date of birth :- </h4>

                                <input class="form-control" required maxlength="10" type="date" name="dob" placeholder="yyyy-mm-dd">
                            </div>
                            </div>

                            <div class="form-group">
                            <div class="col-md-12">
                                <h4>Email-Id :- </h4>
                                <input class="form-control" required type="email" name="email" placeholder="Email id (Required)"><br/>
                                <span class="error"><?php echo $email_err."<br/>" ?></span>
                                <small style="color:green">Your email id will be used as your username !</small>
                            </div>
                            </div>

                            <div class="form-group">
                            <div class="col-md-12">
                                <h4>Coose a password :- </h4>
                                <input class="form-control" required type="password" name="password" placeholder="password (6 characters miinimum)">
                                <span class="error"><?php echo $pass_err."<br/>"; ?></span>

                            </div>
                            </div>


                           

                            <div class="form-group">
                            <div class="col-md-12">
                                                        <legend>Acadamic info</legend>

                                <h4>College :- </h4>
                                <select class="form-control" name="college">
                                    <option selected>STES's SIT Lonavala</option>
                                </select>

                            <h4>Branch :- </h4>
                                <select class="form-control" name="branch">
                                    <option selected>Computer</option>
                                    <option disabled>IT</option>
                                    <option disabled>Electrical</option>
                                    <option disabled>Mechanical</option>
                                </select>
                            </div></div>
                           
                            <div class="form-group">
                            <div class="col-md-6">
                            <h4>Class :- </h4>
                            <select class="form-control" name="class" placeholder="Select one" required>
                                    <option>SE</option>
                                    <option>TE</option>
                                    <option>BE</option>
                            </select>
                            </div>
                            <div class="col-md-6">
                            <h4>Division :- </h4>
                            <select class="form-control" name="division" required>
                                <option>Div-A</option>
                                <option>Div-B</option>
                                <option>Div-C</option>
                            </select>
                            </div>
                            </div> 
                        </div>
                        <hr/>
                            <div class="form-group">
                            <div class="col-md-6">
                            <input class="btn btn-success btn-block" type="submit" value="Submit" name="submit">
                            </div>
                            </div>
                    

                            <div class="form-group">
                            <div class="col-md-6">
                                <a href="index.php"> <input class="btn btn-danger btn-block " type="button" value="cancel" name="cancel"></a>
                                </div>
                            </div>
                    </div>
                        
            </form>
        </div>
        
                     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->       
                <script src="https://code.jquery.com/jquery.js"></script>
                <!-- Include all compiled plugins (below), or include individual files as needed -->
                <script src="file://bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>