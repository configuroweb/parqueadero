<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Receipt</title>

           <link href="assets/css/bootstrap.css" rel="stylesheet">
           <link href="dataTables/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
           <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
          <link rel="stylesheet" href="dataTables/js/reports-plugins/buttons.dataTables.min.css"/>

    <style>

body {
  background: #999;
  padding: 40px;
  font-family: "Open Sans Condensed", sans-serif;
  background: url(assets/img/Smp.jpg) no-repeat center center fixed;
  background-size: cover;
}


    </style>

</head>
<body >


<div class="panel-body">
<div class="table-responsive col-md-6 col-md-offset-3">
<a href="request.php" type="button" class="btn btn-primary btn-lg"><i class="fa fa-hand-o-left" aria-hidden="true"></i> Go Back To Requests</a>
<hr>
<table class="table table-bordered table-hover" >
  <thead style="background: #000 !important; color: #fff;">

     <th>Categoria</th>
     <th>Descripcion</th>

  </thead>
<tbody>
<?php
session_start();
require 'mysqlConnect.php';
require 'attendant_details.php';
$req_id = $_GET['request_id'];
    $req = "SELECT `requests`.`id`, `parking_id`, `slots`, `hours`, `cost`, `time`, `status`,`location`, `street`, `name` FROM `requests`,`parkings` WHERE `requests`.`parking_id`=`parkings`.`id` AND `requests`.`id`='$req_id '  ";

    $res = mysqli_query($con, $req);

while ($request = mysqli_fetch_array($res)) {
    $id = $request['id'];
    $parking = $request['name'];
    $slots= $request['slots'];
    $hours = $request['hours'];
    $cost = $request['cost'];
    $stat = $request['status'];
    $location = $request['location'];
    $when = $request['time'];
    $street = $request['street'];
    $parking_id = $request['parking_id'];





$now = new DateTime();
$now->setTimezone(new DateTimeZone('Africa/Nairobi'));
$before = new DateTime($when);
$interval = $now->diff($before);
$elapsed_h = $interval->format('%y years %m months %a days %h hours %i minutes %s seconds');
$h = $interval->format('%h');
$d = $interval->format('%a');
$m = $interval->format('%i');
$s = $interval->format('%s');

$ttotal = $d *60*24 + $h * 60 + $m;
$totalt = round($ttotal / 60);
$exceeded_time =round(abs($totalt-$hours));
$min_cost = $cost/60;
if ($ttotal>60) {
    $charge = (float)($totalt * $cost);
} else {
    $charge =  "500/=" ;
}


    if($stat=='requested'){
            $update_request = "UPDATE `requests` SET `status`='Completed' WHERE `id`='$id'";
            $update_parkings = "UPDATE `parkings` SET `remaining_slots`=`remaining_slots`+'1' WHERE `id`='$parking_id'";

                if (mysqli_query($con, $update_request) && mysqli_query($con, $update_parkings)) {

                }
    }


?>

<tr>
<td>Parking Name:</td>
<td><?=$parking; ?> Parking</td>
</tr>

<tr>
<td>Served By:</td>
<td><?=isset($fname)." ".isset($lname);?></td>
</tr>

<tr>
<td>Parking location:</td>
<td><?=$location; ?> Area</td>
</tr>

<tr>
<td>Parking street:</td>
 <td><?=$street; ?> Street</td>
 </tr>

<tr>
<td>Numero de Horas:</td>
<td><?=$totalt; ?> Hours</td>
</tr>

<tr>
<td>Numero de Espacios:</td>
<td><?=$slots; ?> Slots</td>
</tr>

<tr>
<td>Dinero Cargado:</td>
<td>COP. <?=$charge; ?></td>
</tr>

<tr>
<td>Request Time:</td>
<td><?=$when; ?> </td>
</tr>

<tr>
<td>Status:</td>
<td><?php
if($totalt >= $hours){
    ?>
      Time Was Exceeded by <?=$exceeded_time;?> Hours
    <?php
}else{
    ?>
      Met the time requirement
    <?php
}

 ?> </td>
</tr>
<?php

}

?>
</tbody>

</table>
</div>
</div>


      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
        <script type="text/javascript" src="dataTables/js/jquery.min.js"></script>
         <script type="text/javascript" src="dataTables/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="dataTables/js/jquery.dataTables.min.js"></script>

        <script src="dataTables/js/reports-plugins/dataTables.buttons.min.js"></script>
        <script src="dataTables/js/reports-plugins/jszip.min.js"></script>
        <script src="dataTables/js/reports-plugins/pdfmake.min.js"></script>
        <script src="dataTables/js/reports-plugins/vfs_fonts.js"></script>
        <script src="dataTables/js/reports-plugins/buttons.flash.min.js"></script>
        <script src="dataTables/js/reports-plugins/buttons.html5.min.js"></script>
        <script src="dataTables/js/reports-plugins/buttons.print.min.js"></script>
        <script>
          function loadData(){

             $(".table").DataTable({
                 dom: 'Brt',
                 buttons: [
                     'pdf', 'print'
                 ]
             });
          }
          document.onready= function (){
                loadData();
            }
    </script>
</body>
</html>