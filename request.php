<?php session_start();
require 'mysqlConnect.php';

require 'attendant_details.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>smart-parking</title>
    <link rel="icon" href="assets/img/ny.jpg" />

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

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">

            <!--logo start-->
            <a href="index.php" class="logo"><b>Smart-parking</b></a>
            <!--logo end-->
               <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="attendant_login.php" style="background-color:#ffd777;">Logout</a></li>
            	</ul>
            </div>

        </header>
      <!--header end-->

      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                    
                  <li class="mt">
                  <a><h5  style="text-transform:uppercase;"> <?=isset($fname) ." ".isset($lname); ?></h5></a>
                      <a href="attendant_portal.php">
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
          <section class="wrapper">
				<div class="row">

	                  <div class="col-md-12">
	                  	  <div class="content-panel">

	                  	  	  <hr>
              <table class="table table-bordered">
                      <tr align="center"><td colspan="6"><h2>View All Requests</h2></tr>
                      <tr align="center">
                      <th>S.N </th>
                      <th>parking_name</th>
                      <th>Slots </th>
                      <th>hour</th>
                      <th>cost</th>
                      <th>Customer</th>
                      <th>Status</th>
                      <th>Print </th>
                      </tr>
<?php
$sel="SELECT `requests`.`id`, `slots`, `hours`, `cost`, `customer`, `time`, `status`,`name` FROM `requests`,`parkings` WHERE `parkings`.`id`=`requests`.`parking_id` ";
$run=mysqli_query($con,$sel)or die(mysqli_error($con));
$i=0;
while($row=mysqli_fetch_array($run)){
$id=$row['id'];
$parking_name=$row['name'];
$slots=$row['slots'];
$hours=$row['hours'];
$cost=$row['cost'];
$customer=$row['customer'];
$status=$row['status'];
$i++;
 
 $url = "attendant_receipt_print.php?request_id=".urlencode($id); 
?>
<tr>
<td><?php echo $i; ?></td>
<td ><strong><?php echo $parking_name; ?></strong></td>
<td><?php echo $slots; ?></td>
<td><?php echo $hours; ?></td>
<td><?php echo $cost; ?></td>
<td><?php echo $customer; ?></td>
<td><?php echo $status; ?></td>
<td><?php
   if($status=='requested'){?>
       <a href="<?=$url?>">Print</a>
<?php   }
?></td>
</tr>
<?php }?>
</table>
<?php
if(isset($_GET['delete']))
{
  $delete_id=$_GET['delete'];
  $delete="DELETE FROM `requests` WHERE `requests`.`id` ='$delete_id'";
  $run_delete=mysqli_query($con,$delete);
  if($run_delete)
  {
    echo "<script>alert('request deleted successfully')</script>";
    echo "<script>window.open('request.php','_self')</script>";
  }
}
?>
	                  	  </div><!--/content-panel -->
	                  </div><!-- /col-md-12 -->

				</div>

		</section><!--wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->

      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->

  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
