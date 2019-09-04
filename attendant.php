<?php
require 'mysqlConnect.php';
require 'update_slots.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>parqueo</title>
    <link rel="icon" href="assets/img/ny.jpg" />

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">


<!-- Bootstrap Core CSS -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="jquery/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">

            <!--logo start-->
            <a href="index.php" class="logo"><b>Parqueo</b></a>
            <!--logo end-->

        </header>
      <!--header end-->
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

                  <p class="centered"><a href="#"><img src="assets/img/assistant-144.png" class="img-circle" width="60"></a></p>
                  <h5 class="centered"> <?php echo $_SESSION['email']; ?></h5>
                  <li class="mt">
                      <a href="admin.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i> Agregar nuevo asistente</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
              <form class="form-horizontal" action="attendant.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <div class="col-sm-10">
            <input type="text" class="form-control"  placeholder="nombre" name="Fname">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-10">
            <input type="text" class="form-control"  placeholder="apellido" name="Lname">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-10">
            <input type="text" class="form-control"  placeholder="Numero de Telefono" name="mobile_no">
          </div>
        </div>

          <div class="form-group">
          <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="usuario" name="username">
          </div>
          </div>
          <div class="form-group">
          <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="clave" name="password">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-6 col-sm-10">
            <button type="submit" class="btn btn-default" name="sub">Enviar</button>
          </div>
        </div>
      </form>
      </div>
    </div>

</section>
<!--/wrapper -->
</section><!-- /MAIN CONTENT -->

<!--main content end-->
<!--footer start-->
<?php
if(isset($_POST['sub'])){
  $Fname=mysqli_real_escape_string($con,$_POST['Fname']);
	$Lname=mysqli_real_escape_string($con,$_POST['Lname']);
	$mobile_no=mysqli_real_escape_string($con,$_POST['mobile_no']);
  $location=mysqli_real_escape_string($con,$_POST['location']);
  $username=mysqli_real_escape_string($con,$_POST['username']);
  $password=mysqli_real_escape_string($con,$_POST['password']);
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  if($Fname==''&& $Lname==''&& $mobile_no=='' && $location==''){
		echo"<script>alert('please fill all field')</script>";
      echo"<script>window.open('attendant.php','_self')</script>";
		exit();
	}
  else{

		$insert="INSERT INTO `attendant` (`id_attendant`, `Fname`, `Lname`, `mobile_no`, `location`,`username`,`password`) VALUES (NULL, '$Fname', '$Lname', '$mobile_no', '$location','$username','$password');";
		$run_insert=mysqli_query($con,$insert);
		if($run_insert){
			echo"<script>alert('registration successful')</script>";
      echo"<script>window.open('attendant.php','_self')</script>";


		}
}}
?>

<footer class="site-footer">
    <div class="text-center">
        &copy; <?php echo date("Y"); ?> Copyright.
        <a href="blank.html#" class="go-top">
            <i class="fa fa-angle-up"></i>
        </a>
    </div>
</footer>
<!--footer end-->
</section>
<!-- js placed at the end of the document so the pages load faster -->
<script src="script.js"></script>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
<!--common script for all pages-->
<script src="assets/js/common-scripts.js"></script>



<!--script for this page-->

</body>
</html>
