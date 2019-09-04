<?php
session_start();
require 'mysqlConnect.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Asistente</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">

		      <form class="form-login" action="attendant_login.php" method="post">
		        <h2 class="form-login-heading">Acceso</h2>
		        <div class="login-wrap">
		            <input type="text" name="username" class="form-control" placeholder="Usuario" autofocus>
		            <br>
		            <input type="password" name="password"  class="form-control" placeholder="Contraseña">
              </br>
            </br>
		            <button class="btn btn-theme btn-block" href="index.php" name='attendant_login'  type="submit"><i class="fa fa-lock"></i> Ingresar</button>
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
if(isset($_POST['attendant_login'])){
$password=mysqli_real_escape_string($con,$_POST['password']);
$username=mysqli_real_escape_string($con,$_POST['username']);

$sel="select * from attendant where username='$username'";
$result=mysqli_query($con,$sel);
if(mysqli_num_rows($result) > 0)
{

  while($row = mysqli_fetch_array($result))
  {
    if(password_verify($password, $row["password"]))
    {
      //return true
      $_SESSION['username']=$username;
      echo"<script>window.open('attendant_portal.php','_self')</script>";
    }
    else
    {
      //return false
       echo"<script>alert('wrong user details,try again!')</script>";
       echo"<script>window.open('attendant_login.php','_self')</script>";
       exit();
    }
  }
}
else{

    echo"<script>alert('wrong user details,try again!')</script>";
    echo"<script>window.open('attendant_login.php','_self')</script>";
    exit();
}
}
?>

  </body>
</html>
