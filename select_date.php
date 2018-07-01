<?php require 'resources/connect.php';?>
    <?php include 'resources/header.php';?>
    <?php
	session_start();
	if($_SESSION['uname']==""){
	header("Location: userLogIn.php");
	}
	$uname=$_SESSION['uname'];
 if(isset($_POST['next'])){
	 $arr_date=date('Y-m-d', strtotime($_POST['arr_date']));
	 $dep_date=date('Y-m-d', strtotime($_POST['dep_date']));
	  $_SESSION['arr_date']=$arr_date;
	  $_SESSION['dep_date']=$dep_date;
	  header("Location: select_room.php");
 }
	?>
 
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <title>e-Reserve | Online Hotel Resevation</title>
    <!--Import Google Icon Font-->
          <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
          <!--Import materialize.css-->
   <link type="text/css" rel="stylesheet" href="css/materialize.css" media="screen,projection"/>
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
    <div class="formElement">
    <form class="" action="" method="post" >
<input type="date" class="datepicker" id="arr_date" name="arr_date" required>
<label for="arr_date">Arrival Date</label>

<input type="date" class="datepicker" id="dep_date" name="dep_date" required>
<label for="dep_date">Depature Date</label></br>
<input name="next" type="submit" class="button" id="next" value="Next" />
  </form>
 

    </div>

    </div>
   
    </body>
    </html>