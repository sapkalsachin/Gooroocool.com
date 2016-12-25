<?php
           
      session_start();
      if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
          header('location: dashboard.php');
      }
      elseif(isset($_POST['username']) && isset($_POST['password']))
        {

        
             if(! get_magic_quotes_gpc() ) 
             {
            
                 $username = addslashes ($_POST['username']); 
                 $password = addslashes ($_POST['password']); 
             }
             else 
             { 

                 $username = $_POST['username']; 
                 $password = $_POST['password'];   
             }
             
             $db_user = ""; //Database username
             $db_pass = ""; //Database password
             $db_name = ""; //Database name
                       
            /////////////////////////////////////////////////////////////////////
                    $conn = mysqli_connect('localhost', '$db_user', '$db_pass','$db_name');
                    if(! $conn)
                    {
                        die('Connectoin failed'. mysql_error());
                    }
             /////////////////////////////////////////////////////////////////////

        $password = sha1($password,TRUE);
        $log_query =  "SELECT * from user_info where username ='$username' AND password = '$password'";
         mysqli_query( $conn, $log_query); 
     
        $rows = mysqli_affected_rows($conn);
        if ($rows == 1) 
        {
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
           
          header('location: dashboard.php');
        } 
        else 
        {
            echo '<br><br><h3 class="text-center alert alert-danger">Username or Password is invalid!<br/>';
            echo 'redirecting to login page!</h3>';
            echo '<script>setTimeout(function () { window.location.href = "index.php";}, 2000);</script>';
        }
    }


    ?>  

<html>
    <head>

      <title>Gooroocool</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="css/custom.css" rel="stylesheet">
            <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">  

            <script type="text/javascript">               
                $(document).ready(function (e) {
                  $("#uploadForm").on('submit',(function(e) {
                    e.preventDefault();
                    $.ajax({
                          url: "index.php",
                      type: "POST",
                      data:  new FormData(this),
                      contentType: false,
                          cache: false,
                      processData:false,
                      success: function(data)
                        {
                         $("#response").html(data);
                        },
                        error: function() 
                        {
                        }           
                     });
                  }));
                });
            </script>
    </head>
    
    <body class="mainpage">
        <div class="jumbotron">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-12">
              <center><img src="img/gclogo.png" class="logo_img"></center>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-md-offset-3">
              <form method="POST" action="#" id="uploadForm">
                <div class="form-group">
                  <input class="form-control input-lg" type="text" id="username" name="username" placeholder="Email">
                </div>
                <div class="form-group">
                  <input class="form-control input-lg" type="password" id="password" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-success  btn-block" onclick="check_login()" name="submit" id="submit" value="Login">
                </div>
                <div class="form-group">
                  <a class="btn btn-info  btn-block" href="signup.php">Signup</a>
                </div>                
                </form>
            </div>
          </div>
        </div>
          
        </div>
        <footer class="footer">
          <center>&copy All copyrights are reserved</center>
          <center>Designed and developed by Sachin Sapkal</center>
        </footer>  
        <div class="container" id="response"></div>
        <script src="js/jq191.js" type="text/javascript"></script>  
    </body>
</html>