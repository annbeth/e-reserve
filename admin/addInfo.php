<?php include 'resources/connect.php';?>
<?php include 'resources/header.php';?>
<?php 
session_start();
if($_SESSION["code"]==""){
	header("Location: hotel_login.php");
	}
	$code=$_SESSION['code'];
?>
 <?php
//if(isset($_GET['msg'])){
//	$code=$_GET['msg'];
//}
//	?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>e-Reserve | Online Hotel Resevation</title>
</head>

<!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>
<link type="text/css" rel="stylesheet" href="css/style.css" media="screen,projection"/>
<link type="text/css" rel="stylesheet" href="css/animate.css" media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<div class="banner">    	   
    <img src="images/banner.jpg"  class="img-responsive" alt="slide">
    <div class="welcome-message">
        <div class="wrap-info">
            <div class="information">
                <h1  class="animated fadeInDown">e-Reserve:Online Hotel Reservation</h1>
                <p class="animated fadeInUp">Discover and book the most luxurious hotels around the world.</p>                
            </div>
            <a href="#information" class="arrow-nav scroll wowload fadeInDownBig"><i class="fa fa-angle-down"></i></a>
        </div>
    </div>
</div>
<div align="center">
<?php
$sql = "SELECT hotel_name FROM hotel_info WHERE hotel_code=$code";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<h2>Welcome to " . $row["hotel_name"]." hotel</h2>";
    }
} else {
    echo "0 results";
}
?>

<form action="upload.php" method="post" enctype="multipart/form-data">
<div class="formElement">
   <input name="location" type="text" class="TField" id="location" required="required" placeholder="Enter Hotel Location" />
   <textarea name="info" cols="5000"  id="info" required="required" placeholder="Enter Hotel Info"></textarea> 
 

    <div class="file-field input-field">
      <div class="btn">
        <span>File</span>
        <input type="file" name="photo" id="photo">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>


<input name="Submit" type="submit" class="button" id="Submit" value="Submit" />
</div>
</form>
</div>





<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>

</body>
</html>