<?php require 'connect.php';?>
<?php include 'header.php';?>
<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>e-Reserve | Online Hotel Resevation</title>
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
<?php
$sql = "SELECT hotel_name, location, description FROM hotel_info";
  $result = mysqli_query($conn, $sql);
?>
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
<h2><?php
     $code=$_GET["id"];
	$sql = "SELECT hotel_name FROM hotel_info WHERE hotel_code=$code";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
	  // output data of each row
	  while($row = mysqli_fetch_assoc($result)) {
		  echo "Welcome to " . $row["hotel_name"]; 
	   }
  }
?></h2>
<div>
<?php
$sql = "SELECT hotel_name, location, description FROM hotel_info";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
	  // output data of each row
	  while($row = mysqli_fetch_assoc($result)) {
		  echo "Hotel: " . $row["hotel_name"]. "  | " . $row["location"]. " | " . $row["description"]; 
	   }
  }

?>
</div>
<input name="Book" type="submit" class="button" id="Register" value="Book" />
</div>
</form>
</div>


<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
</body>
</html>