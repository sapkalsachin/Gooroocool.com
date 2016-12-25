<?php
	session_start();
 if(!isset($_SESSION['username']) && !isset($_SESSION['password']))
  {
    echo '<h1>Sorry dear :( </h1><h3>You need to <a href="index.php">login</a> first!</h3>';
  } 
  else{  
   require_once("user_info.php");
  $user_info = get_user_data($_SESSION['username']);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Blogging | gooroocool.com</title>
	<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Goorookool</title>
        <!--JQuery-->
          <script src="jquery.min.js"></script>
            <script>

            $("#writeblog").ready(function(){
              $('#writeblog').hide();
            });
              $(document).ready(function(){
                
                $("#addition_button").click(function(){
                $("#writeblog").slideDown(200);
                $("#addition_button").hide();
                }); 

                $("#close_writeblog").click(function(){
                $("#writeblog").slideUp(200);
                $("#addition_button").fadeIn(2000);
                $("#data_target").fadeIn();
                });
                
                $.get("show_blog_post.php", function(data)
                  {
                    $("#data_target").html(data); 
                  });

                $("#addition_button").click(function(){
                  $("#data_target").hide();
                });
          
              });
            </script>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/custom.css">

</head>
<body>
 		 <div class="middle">
           <nav class="navbar navbar-default navbar-fixed-top dash-nav" role="navigation"> 
           <div class="container">
            <div class="navbar-header"> 
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse"> 
                    <span class="sr-only">Toggle navigation</span> 
                    <span class="icon-bar"></span> 
                    <span class="icon-bar"></span> 
                    <span class="icon-bar"></span> 
              </button> 

              <div class="navbar-brand"><img  href="#"><img class="logo" src="img/logo.png"></div> 

              </div> 
                  <div class="collapse navbar-collapse navbar-right" id="example-navbar-collapse"> 
                      <ul class="nav navbar-nav"> 
                          <li><a href="dashboard.php">Dashboard</a></li> 
                          <li class="active"><a href="blogging.php">Blogging</a></li> 
                          <li><a href="chatting">Chatting</a></li>
                           <li class="dropdown"> 
                              <a style="color:red" href="#" class="dropdown-toggle" data-toggle="dropdown">Hi <?php echo $user_info['firstname']."       "; ?><span class="glyphicon glyphicon-user "></span> <b class="caret"></b> </a> 
                              <ul class="dropdown-menu"> 
                                  <li><a href="logout.php"><span class="glyphicon glyphicon-off "> </span>  Logout</a></li> 
                                  <li class="divider"></li> 
                              </ul> 
                          </li>
                          <li>
                            <span></span>
                          </li>
                      </ul> 
                  </div></div>
              </nav>
           </div>
<section style="height:4em;"></section>

<div class="container" id="blog_load">

</div>
  
<div id="messagebox">
  
</div>
<div class="writeblog" id="writeblog">
  
            <div class="container">
              <form id="uploadForm" method="POST" action="upload_blog.php">
                  <div id="uploadFormLayer">
                        <div class="form-group">
                          <h3><center>Write your own blog post.</center></h3>
                        </div>
                       <div class="form-group">
                          <label for="postTitle"><h3>Post Title</h3></label>
                            <input type="text" width="300px" id="title" name="title" placeholder="Post Title" class="form-control" required autofocus>
                          </div>

                              <div class="form-group">
                                <label for="description"><h3>Post Description</h3></label>
                                <textarea name="description" rows="3" cols="20" maxlength="250" placeholder="Short description about your post" id="description" class="form-control space" required></textarea>
                              </div>

                              
                            
                              <div class="form-group">
                                <label for="content"><h3>Post Content</h3></label>
                                <textarea name="content" rows="6" cols="20" placeholder="Post Content" id="content" class="form-control space" required></textarea>
                              </div> 
                         
                    </div>
                    <div class="form-group">
                    <input type="submit" class="btn btn-sm btn-success" name="submit" value="Submit Post">
                    <button type="reset" class="btn btn-sm btn-danger pull-right" id="close_writeblog">Close</button>
                    </div>
                </form>
              </div>
              
</div>

              <div class="container" id="data_target">
                
              </div>

<div class="addition_button">
  <img id="addition_button" title="Write a new blog post." src="img/add.png">
</div>
        <script src="bootstrap/JQuery/jquery.min.js" rel="javascript/text"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="js/dashboardjs.js" type="text/javascript"></script>
<!-- include summernote css/js-->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
     <script>
        $(document).ready(function() {
        $('#content').summernote({
          height: 300,
        });
        });

    </script>
            <link rel="stylesheet" type="text/css" href="css/custom.css">

</body>
</html>
<?php
}
?>