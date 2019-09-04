<?php
require 'mysqlConnect.php';
//session_start();
$username = isset($_SESSION['username']);
$select_att = "SELECT * FROM `attendant` WHERE `username`='$username'";
$att_result = mysqli_query($con, $select_att);

while ($attendant = mysqli_fetch_array($att_result )) {
    $fname = $attendant['Fname'];
    $lname = $attendant['Lname'];
    $phone = $attendant['mobile_no'];
}
?>