<?php include 'connect.php';


function NewHotel()
{
    $hotelcode=$_POST['code'];
	$hotelname = $_POST['name'];
	$email = $_POST['email'];
	$password =  $_POST['pass'];
	$phone=$_POST['phone'];
	$query = "INSERT INTO hotel (hotel_code,hotel_name,email,password,phone) VALUES ('$hotelcode','$hotelname','$email','$password','$phone')";
	$data = mysql_query ($query)or die(mysql_error());
	if($data)
	{
	echo "YOUR REGISTRATION IS COMPLETED...";
	}
}

function SignUp()
{
if(!empty($_POST['user']))   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
{
	$query = mysql_query("SELECT * FROM hotel WHERE hotel_code = '$_POST[hotelcode]' AND password = '$_POST[pass]'") or die(mysql_error());

	if(!$row = mysql_fetch_array($query) or die(mysql_error()))
	{
		NewHotel();
	}
	else
	{
		echo "SORRY...YOU ARE ALREADY REGISTERED USER...";
	}
}
}
if(isset($_POST['submit']))
{
	SignUp();
}
?>
