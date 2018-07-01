
	<?php
session_start();
require "resources/connect.php";
	
$message="";
if(isset($_POST["login"])) {
	//$result = mysqli_query($conn,"SELECT * FROM users WHERE username='" . $_POST["user_name"] . "' and password = '". $_POST["password"]."'");
	$result = mysqli_query($conn,"SELECT * FROM users WHERE username='Syl' and password = '	ffb85bfe93f1d2f1654a7048b87f0403'");
	$row  = mysqli_fetch_array($result);
	if(is_array($row)) {
	$_SESSION["uname"] = $row['uname'];
	header("Location: welcome.php");
	} else {
	$message = "Invalid Username or Password!";
	}
}
?>