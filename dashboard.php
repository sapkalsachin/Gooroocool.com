<?php 
  session_start();
  $username = $_SESSION['username'];
 
 
  if(!isset($_SESSION['username']) && !isset($_SESSION['password']))
  {
    echo '<h1>Sorry dear :( </h1><h3>You need to <a href="index.php">login</a> first!</h3>';
  } 
  else{  
   require_once("user_info.php");
  $user_info = get_user_data($username);
 ?>
<html>
    <head>

       <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gooroocool</title>

        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/custom.css">

   

    </head>
    
    <body class="dashboard">
       
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
                          <li class="active"><a href="dashboard.php">Dashboard</a></li> 
                          <li><a href="blogging.php">Blogging</a></li> 
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

            <div class="container">
                <div class="row">
                  <div class="col-md-8 col-xs-12">
                    <div class="panel-group">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h5 class="panel-title">
                            <a data-toggle="collapse" href="#collapse1" style="color:red"><center><span class=" glyphicon glyphicon-list"></span> Upload new</center></a>
                          </h5>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse">
                          <div class="panel-body">
                            <button type="button" class="btn btn-link btn-block" data-toggle="modal" data-target="#status-model">
                                  Status <span class="glyphicon glyphicon-pencil"></span>
                                </button>
                                <hr>

                                 <button type="button" class="btn btn-link btn-block" data-toggle="modal" data-target="#photo-model">
                                  Photo <span class="glyphicon glyphicon-camera"></span>
                                  </button>
                                  <hr>

                                 <a href="blogging.php" class="btn btn-link btn-block">
                                  Blog post <span class="glyphicon glyphicon-list-alt"></span>
                                </a>

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                </div>
          


                         <!-- Status model -->
                            <div class="modal fade" id="status-model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                                <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    <h4 class="modal-title" id="myModalLabel">Write status</h4>
                                                </div>
                  
                                                <div class="modal-body">
                                                   <div class="form-group">
                                                      <label for="status" class="glyphicon glyphicon-pencil"></label>
                                                      <textarea maxlength="500" class="form-control status_input" placeholder="Your status goes here..." rows="5" id="status_input"></textarea>
                                                    </div> 
                                               </div>
                  
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">
                                                      Close
                                                  </button>
                                                  <button type="button" class="btn btn-success btn-sm" onclick="upload_status();">
                                                      Upload
                                                  </button>
                                                </div>
                                                <div id="response_alert"></div> <!--Notification-->
                                    </div>
                              </div>
                            </div>


                            <!-- photo model-->
                            <div class="modal fade" id="photo-model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                      <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>

                                          <h4 class="modal-title" id="myModalLabel">Upload photo</h4>
                                          <small>NOTE:<br> Only .jpg .jpeg .png and .gif type of files are allowed. <br>
                                          File size must be less than 2MB.
                                          </small>
                                      </div>
        
                                      <div class="modal-body">
                                            

                                      <form id="uploadForm" action="upload.php" method="post">
                                        <div id="uploadFormLayer">
                                        


                                                <div class="form-group">
                                                <div class="col-md-12">
                                              
                                                    <input class="form-control" type="file" name="userImage" placeholder="username">
                                                </div>
                                                </div>


                                                <div class="form-group">
                                                <div class="col-md-12">
                                                    <h4>Say something about this file :- </h4>
                                                    <textarea class="form-control" type="textarea" name="description" id="description" placeholder="Your description goes here..."></textarea>
                                                </div>
                                              </div>   
                                          </div>
                                                                    
                                      </div>
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-success btn-sm btn-link" data-toggle="modal" data-target="#preview-model" value="Submit" >
                                            Upload
                                        </button>
                                      </div>
                                      </form>

                                      
                                </div>
                              </div>
                            </div>
                            </div>

<!--Photo preview-->

                            <div class='container'>
                              <div class="modal fade" id="preview-model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                                <div  id="messagebox">
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-info btn-sm" data-dismiss="modal" onclick="setTimeout(function () { window.location.href = 'dashboard.php';}, 300);">
                                                      OK
                                                  </button>
                                                 
                                                </div>
                                                <div id="response_alert"></div> <!--Notification-->
                                    </div>
                              </div>
                            </div>
                            </div>



                          
     




     <!--POSTS-->
                 <div class="container">
                    <div class="row">
                    
                    </div>

                      <div class="row">
                        <div class="col-md-8 col-xs-12" id="data_target">
                        </div>
                       
                      <div class="col-md-4 visible-md visible-lg ">
                        <div class="row">
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3><center>What's new</center></h3>
                            </div>
                            <div class="panel-body">
                              <h2>
                                (Latest Notifications, blog posts comes here...)
                              </h2>                        
                            </div>
                          </div>
                            
                          </div>
                        </div>
                         
                       </div>
                      </div>
                  </div>
          

    <script src="js/jq191.js"></script>
<script type="text/javascript">
$(document).ready(function (e) {
  $("#uploadForm").on('submit',(function(e) {
    e.preventDefault();
    $.ajax({
          url: "upload.php",
      type: "POST",
      data:  new FormData(this),
      contentType: false,
          cache: false,
      processData:false,
      success: function(data)
        {
      $("#messagebox").html(data);
        },
        error: function() 
        {
        }           
     });
  }));
});
$( "#data_target" ).load( "load_data.php", function() {
});
</script>

        <!-- Links 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script-->
        <script src="bootstrap/JQuery/jquery.min.js" rel="javascript/text"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="js/dashboardjs.js" type="text/javascript"></script>
    </body>
    </html>
    <?php  } ?>