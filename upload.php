<?php
require 'mysqlConnect.php';
?>
<?php
if(isset($_POST['sub'])){
	$location=mysqli_real_escape_string($con,$_POST['location']);
	$street = mysqli_real_escape_string($con,$_POST['street']);
	$name=mysqli_real_escape_string($con,$_POST['name']);
	$slot=mysqli_real_escape_string($con,$_POST['slot']);
	$remaining_slots=mysqli_real_escape_string($con,$_POST['remaining_slots']);
	$price=mysqli_real_escape_string($con,$_POST['price']);
	$attendant=mysqli_real_escape_string($con,$_POST['attendant']);


	   if($location==''&& $street==''&& $name=='' && $slot=='' && $price=='' && $remaining_slots==''){
		echo"<script>alert('please fill all field')</script>";
		echo"<script>window.open('blank.php','_self')</script>";
		exit();
	 }

	else{

		$insert="INSERT INTO `parkings` (`id`, `location`, `street`, `name`, `slot` , `price`,`remaining_slots`,`attendant`) VALUES (NULL, '$location', '$street', '$name', '$slot' , '$price','$remaining_slots','$attendant');";
		$run_insert=mysqli_query($con,$insert);
		if($run_insert){
			echo"<script>alert('Successful added!')</script>";
			echo"<script>window.open('blank.php','_self')</script>";

		}
		else{
			echo"<script>alert('Error please try again')</script>";
			echo"<script>window.open('blank.php','_self')</script>";
		}
}}

?>
