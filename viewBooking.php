
<?php require 'resources/connect.php';?>
<?php
session_start();
if($_SESSION['uname']==""){
	header("Location: userLogIn.php");
	}
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
	$price=$row['category_price'];
	$cat=$row['category_name'];
	
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

<body background="images/banner.jpg">
<div class="banner">    	   
    
    <div class="welcome-message">
        <div class="wrap-info">
            <div class="information">
            <p><?php include 'resources/header.php';?></p>
                <h1  class="animated fadeInDown">e-Reserve:Online Hotel Reservation</h1>
                <p class="animated fadeInUp">Discover and book the most luxurious hotels around the world.</p>                
            </div>
           
        </div>
    </div>
</div>


<div align="center">
<form class="frmReceipt">

<div id="printableArea">
<img src="images/icon.png" class="circle">
  <h2>Booking Receipt</h2>
  <table style="height:10%">
  <tr>
  <td>
 <h4> Client Name: <?php echo $name;?></h4> 
  </td>
  </tr>
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
  <h4> Room Number: <?php echo $room;?></h4>
  </td>
  </tr>
  <tr>
  <td>
 <h4> Price: <?php echo $price;?></h4>
  </td>
  </tr>
  </table>
  </div>
  <input type="button" onclick="printDiv('printableArea')" value="Print Receipt" class=" btn"/>
  </form>

      </div>
  <script>
  function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
  </script>
</body>
</html>