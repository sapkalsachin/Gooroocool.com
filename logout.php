<?php

session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password']))
{
    echo '<h1>Sorry dear :( </h1><h3>You need to <a href="index.php">login</a> first!</h3>';
	echo '<script>setTimeout(function () { window.location.href = "index.php";}, 2000);</script>';
	die();
	
}
unset($_SESSION['username']);
session_destroy();
if(isset($_SESSION['username']))
echo 'error in logout';
else
{
	
	echo '<br><br><div class="container"><h3 class="text-center">logout successfully! redirecting you to login page</h3></div>';
	echo '<script>setTimeout(function () { window.location.href = "index.php";}, 2000);</script>';
}

?>