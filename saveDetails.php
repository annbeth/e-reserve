<?php require 'connect.php';?>

<?php 
if(isset($_POST['Register'])){
	
 $hotelcode=$_POST['hotelcode'];
	$hotelname=$_POST['hotelname'];
	$businessemail=$_POST['businessemail'];
	$password=$_POST['password'];
	$cpassword=$_POST['cpassword'];
	$phone=$_POST['phone'];
	if($cpassword==$password){
		$insert= mysqli_query( "INSERT INTO hotel_info (hotel_code,hotel_name,email,password,phone) VALUES ('$hotelcode','$hotelname','$businessemail','$password','$phone')");
		}
else{
	echo '<script>alert("Passwords do not match")</script>';
	}
	}
?>