<?php
session_start();
require 'update_slots.php';
require 'mysqlConnect.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">

    <title>Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">

		      <form class="form-login" action="admin_login.php" method="post">
		        <h2 class="form-login-heading">sign in now</h2>
		        <div class="login-wrap">
		            <input type="text" name="email" class="form-control" placeholder="email" autofocus>
		            <br>
		            <input type="password" name="password"  class="form-control" placeholder="Password">
              </br>
            </br>
		            <button class="btn btn-theme btn-block" href="index.php" name='admin_login'  type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
		          <!-- Modal -->
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
		                          <button class="btn btn-theme" type="button">Submit</button>
		                      </div>
		                  </div>
		              </div>
		          </div>
		          <!-- modal -->

		      </form>

	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/Smp.jpg", {speed: 500});
    </script>
    <?php
  if(isset($_POST['admin_login'])){
  $password=mysqli_real_escape_string($con,$_POST['password']);
  $email=mysqli_real_escape_string($con,$_POST['email']);

  $sel="select * from admin where email='$email' AND password='$password'";
  $run=mysqli_query($con,$sel);
  $check=mysqli_num_rows($run);
  if($check==0)
  {
  	echo"<script>alert('password or email is not correct,try again!')</script>";
  	exit();
  }
  else{
  	$_SESSION['email']=$email;
  	echo"<script>window.open('admin.php','_self')</script>";
  }
  }
  ?>

  </body>
</html>
