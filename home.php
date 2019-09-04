<?php
session_start();
require 'mysqlConnect.php';
require 'update_slots.php';
require "driver.details.php";
if (!$_SESSION['driver_email']) {
  header("location: index.php");
}
else {

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Smart Parking Web Portal</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="datatable/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="datatable/keyTable.bootstrap.min.css" rel="stylesheet">
    <link href="custom.css" rel="stylesheet">
    <style>



.area{
  margin-bottom: 15px;
}

.cart-nav ul li {
  margin:3%;
  padding: 3%;
  color: #0000 !important;
}

.Head {
  text-transform: uppercase;

   color: 	#009688 !important;
}

.modal-backdrop {
    z-index: 1020 !important;
}

.parking_text {
  color: #2F4F4F !important;
  text-transform: uppercase;
}

.total {
  color: #FF0000 !important;
}
.modal { background: rgba(000, 000, 000, 0.8); min-height:1000000px; }

.fa-circle {
  color: green;
}
    </style>
</head>
<body>
    <div >
      <div class="container">
         <div class="col-md-3"></div>
         <div class="col-md-8">
                 <center><h1 class="colors"><a href="home.php" style="text-decoration: none; color:white;">Parqueadero</a></h1></center>

         </div>
         <div class="col-md-1"></div>
</div>

<div class="row">
   <div class="container">

         <div class="cart-nav col-xs-4">
           <ul>
             <li class="list-group-item" id="requests">
                <div class="thumbnail">
                      <div class="caption">
                      <center>
                        <h3><?=$name?></h3>
                        <p>(<?=$email?>)</p>
                        <p><i id="#online" class="fa fa-circle" aria-hidden="true"></i> Online</p>
                        <p><a href="logout.php"><i class="fa fa-power-off" aria-hidden="true"></i> lOGOUT</a></p>
                        </center>
                      </div>
                    </div>
             </li>

             <li class="list-group-item" >
               <select class="form-control" onchange="filter_park()" id="city">
                 <option value="Norte">Norte</option>
                 <option value="Sur">Sur</option>
                 <option value="Este">Este</option>
                 <option value="Oeste">Oeste</option>
               </select>
             </li>

             <li class="list-group-item">
               <select class="form-control" onchange="filter_park()" id="street">
                 <option value="">----[Buscar Ubicacion]----</option>
                 <option value="Calle 5">Calle 5</option>
                 <option value="Calle 25">Calle 25</option>
                 <option value="Calle 1">Calle 1</option>
               </select>
             </li>

             <li class="list-group-item" id="requests"><a><span class="glyphicon glyphicon-envelope"></span> Notificaciones</a></li>


           </ul>
         </div>

         <div class="content col-xs-8">
            <div id = "home">

            </div>
         </div>

   </div>
</div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="jquery/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <script>
$("#home").load("parkings/parkings.php");

  function filter_park(){
    var city1 = $("#city").val();
    var street1 = $("#street").val();
 $.post("parkings/parkings.php", {city:city1, street:street1}, function(data){
    $("#home").html(data);
 })

  }

  $("#requests").click(function(){
    $("#home").load("feedback/requests.php");
  });

  $("#receipt").click(function(){
    $("#home").load("receipt/new.php");
  });

    </script>
  </body>
</html>
<?php } ?>
