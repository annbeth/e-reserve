<?php require 'resources/connect.php';?>
<?php include 'resources/header.php';?>
<?php session_start();
if($_SESSION["code"]==""){
	header("Location: add.php");
	}
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
<h2>Welcome to e-Reserve</h2>
<h3>Please add hotel categories</h3>
<form action="upload_cat.php" method="post" enctype="multipart/form-data">
<div class="formElement">
   <input name="cat_name" type="text" class="TField" id="cat_name" required="required" placeholder="Enter Category Name" />
   <textarea name="cat_details" cols="5000"  id="" required="required" placeholder="Enter Category Details"></textarea> 
    <input name="cat_price" type="text" class="TField" id="cat_price" required="required" placeholder="Enter Category Price" />
  
    <p><bold> Select image to upload:</bold><input type="file" name="photo" id="photo"></p>
     <input name="max_persons" type="text" class="TField" id="max_persons" required="required" placeholder="Enter Maximum Number of Persons" />

<input name="Submit" type="submit" class="button" id="Submit" value="Submit" />
</div>
</form>
</div>

<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
</body>
</html>