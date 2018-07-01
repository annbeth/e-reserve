<?php require 'resources/connect.php';?>
<?php include 'resources/signin_header.php';?>

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
<form action="add_funct.php" method="post" name="RegisterForm" id="RegisterName" enctype="multipart/form-data">
<div class="formElement">
   <input name="hotelcode" type="text" class="TField" id="code" required="required" placeholder="Enter Hotel Code" />
  <input name="hotelname" type="text" class="TField" id="name"  required="required" placeholder="Enter Hotel Name"  /> 
  <input name="businessemail" type="text" class="TField" id="email"  required="required" placeholder="Enter Business Email"/>
  <input name="password" type="password" class="TField" id="pass"  required="required" placeholder="Enter Password" />
  <input name="cpassword" type="password" class="TField" id="cpass"  required="required" placeholder="Confirm Password" />
  <input name="phone" type="text" class="TField" id="phone"  required="required" placeholder="Enter Phone Number"/>
  <div class="file-field input-field">
      <div class="btn">
        <span>File</span>
        <input type="file" name="photo" id="photo">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>

<input name="Register" type="submit" class="button" id="Register" value="Register" />
</div>
</form>
</div>


<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
</body>
</html>