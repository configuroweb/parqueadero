<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Print Preview Example Page</title>
    <link rel="stylesheet" href="css/960.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/print.css" type="text/css" media="print" />
    <link rel="stylesheet" href="src/css/print-preview.css" type="text/css" media="screen">
    <script src="http://cdn.jquerytools.org/1.2.5/full/jquery.tools.min.js"></script>
    <script src="src/jquery.print-preview.js" type="text/javascript" charset="utf-8"></script>
    <link href="assets/css/bootstrap.css" rel="stylesheet">  

    <style>
    
body {
  background: #999;
  padding: 40px;
  font-family: "Open Sans Condensed", sans-serif;
  background: url(assets/img/1.jpg) no-repeat center center fixed;
  background-size: cover;
}  

.recept {
background: rgba(130,130,130,.9);
height: 100%;
color:white;
background-size: cover;    
}  
    </style>   
    <script type="text/javascript">
        $(function() {
            /*
             * Initialise example carousel
             */
            $("#feature > div").scrollable({interval: 2000}).autoscroll();
            
            /*
             * Initialise print preview plugin
             */
            // Add link for print preview and intialise
            $('#aside').prepend('<a class="print-preview">Print this page</a>');
            $('a.print-preview').printPreview();
            
            // Add keybinding (not recommended for production use)
            $(document).bind('keydown', function(e) {
                var code = (e.keyCode ? e.keyCode : e.which);
                if (code == 80 && !$('#print-modal').length) {
                    $.printPreview.loadPrintPreview();
                    return false;
                }            
            });
        });
    </script>
</head>
<body >                
<div id="header" class="container_12">
     <strong><small>Invoice(Not Paid)</small></strong>
</div>

<div class="container_12 clearfix recept">
 
    <div id="content-main" class="grid_8">

<table class="table table-bordered">
  <thead>
     <th></th>
     <th></th>
  </thead>

<tbody>
<?php
require 'mysqlConnect.php';
require 'update_slots.php';
$req_id = $_GET['request_id'];
    $req = "SELECT `requests`.`id`, `parking_id`, `slots`, `hours`, `cost`, `time`, `status`,`location`, `street`, `name` FROM `requests`,`parkings` WHERE `requests`.`parking_id`=`parkings`.`id` AND `requests`.`id`='$req_id '";

    $res = mysqli_query($con, $req);

while ($request = mysqli_fetch_array($res)) {
    $id = $request['id'];
    $parking = $request['name'];
    $slots= $request['slots'];
    $hours = $request['hours'];
    $cost = $request['cost'];
    $time = $request['time'];
    $stat = $request['status'];
    $location = $request['location'];
    $street = $request['street'];

?>
<tr>
<td>Parking Name:</td>
<td><?=$parking; ?></td>
<tr>

<tr>
<td>Parking location:</td> 
<td><?=$location; ?></td>
</tr>

<tr>
<td>Parking street:</td>
 <td><?=$street; ?></td>
 </tr>

<tr>
<td>Number Of Hours:</td> 
<td><?=$hours; ?> Hours</td>
</tr>

<tr>
<td>Number Of Slots:</td> 
<td><?=$slots; ?> Slots</td>
</tr>

<tr>
<td>Amount Charged:</td> 
<td>Ksh. <?=$cost; ?></td>
</tr>

<?php    

}  

?>      
</tbody>

      

    <div id="aside" class="grid_3 "></div>
<div id="content"></div>
</div>
</div>
</body>
</html>