<?php require 'resources/connect.php';?>
    <?php include 'resources/header.php';?>
    <?php
	session_start();
	if($_SESSION['uname']==""){
	header("Location: userLogIn.php");
	}
	$uname=$_SESSION['uname'];
 $name=$_SESSION['name'];
$code=$_SESSION['code'];
 $room=$_SESSION['room'];
 $cat=$_SESSION['category'];
 $hotel_sel="SELECT * FROM hotel_info  WHERE hotel_code='$code'";
		$que_hotel_sel=mysqli_query($conn,$hotel_sel);
while($row = mysqli_fetch_assoc($que_hotel_sel)) {
	$hotelname=$row['hotel_name'];
	
}
$price_sel="SELECT * FROM category  WHERE category_id='$cat'";
		$que_price_sel=mysqli_query($conn,$price_sel);
while($row = mysqli_fetch_assoc($que_price_sel)) {
	$pri=$row['category_price'];
	$cat=$row['category_name'];
	 $arr_date=$_SESSION['arr_date'];
	 $dep_date=$_SESSION['dep_date'];
	 $start=strtotime($arr_date);
	 $end=strtotime($dep_date);
	   $ms=$end-$start;
	   $days=$ms/86400;
	   $_SESSION['days']=$days;
	   $price=$pri*$days;
}
	
 if(isset($_POST['book'])){
	
	  $sql = "INSERT INTO booking (hotel_code,username,room_ID,arr_date,dep_date,days) VALUES ('$code','$uname','$room','$arr_date','$dep_date','$days')";
if (mysqli_query($conn, $sql)) {

$update_room="UPDATE rooms SET status='booked' WHERE room_id=$room";
if (mysqli_query($conn, $update_room)) {
header("Location: payment.php");
}
else{
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
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
                    <h2> Logged In as: <?php echo $name;?> </h2>
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
<h3>Welcome <?php echo $name;?> </h3>
<h3>Please Confirm your booking details</h3>
  <table style="height:10%">
  <tr>
  <td>
<h4> Hotel Name: <?php echo $hotelname;?></h4> 
  </td>
  </tr>
  <tr>
  <td>
  <h4> Room Category: <?php echo $cat;?></h4>
  </td>
  </tr>
  <tr>
  <td>
  <h4> Room ID: <?php echo $room;?></h4>
  </td>
  </tr>
  <tr>
  <td>
 <h4> Check In Date: <?php echo $arr_date;?></h4>
  </td>
  </tr>
  <tr>
  <td>
 <h4> Check Out Date: <?php echo $dep_date;?></h4>
  </td>
  </tr>
  <tr>
  <td>
 <h4> Price: <?php echo $price;?></h4>
  </td>
  </tr>
  </table>
<input name="book" type="submit" class="button" id="book" value="Book" />
  </form>
 

    </div>

    </div>
   
    </body>
    </html>