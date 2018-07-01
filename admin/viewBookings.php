<?php include 'resources/header.php';?>
<?php require 'resources/connect.php';?>
<?php
session_start();
$code=$_SESSION['code'];
 $hotel_sel="SELECT * FROM hotel_info  WHERE hotel_code='$code'";
		$que_hotel_sel=mysqli_query($conn,$hotel_sel);
while($row = mysqli_fetch_assoc($que_hotel_sel)) {
	$hotelname=$row['hotel_name'];
	
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
                <h1  class="animated fadeInDown">e-Reserve:Online Hotel Reservation</h1>
                <p class="animated fadeInUp">Discover and book the most luxurious hotels around the world.</p>                
            </div>
           
        </div>
    </div>
</div>


<div align="center">
<div class="centered-report">
  <h2><?php echo $hotelname;?> Bookings</h2>
  <table class="highlight" bgcolor="#FFFFFF">
  <tr bgcolor="#003399">
  <th scope="col" >ID</th>
    <th scope="col">First Name</th>
    <th scope="col">Last Name</th>
    <th scope="col">Category</th>
    <th scope="col">Room No</th>
    <th scope="col">Arrival Date</th>
    <th scope="col">Depature Date</th>
    <th scope="col">Days</th>
  </tr>

  <?php
  $booking_sel="SELECT * FROM booking  WHERE hotel_code='$code'";
		$que_booking_sel= mysqli_query($conn,$booking_sel);
while($row = mysqli_fetch_assoc($que_booking_sel)) {
	$ID=$row['booking_ID'];
	$uname=$row['username'];
	$room=$row['room_ID'];
	$arr=$row['arr_date'];
	$dep=$row['dep_date'];
	$days=$row['days'];
	$user_sel="SELECT * FROM users  WHERE username='$uname'";
		$que_user_sel=mysqli_query($conn,$user_sel);
while($row = mysqli_fetch_assoc($que_user_sel)) {
	$fname=$row['fname'];
	$lname=$row['lname'];
	$room_sel="SELECT * FROM rooms  WHERE room_ID='$room'";
	$que_room_sel=mysqli_query($conn,$room_sel);
while($row = mysqli_fetch_assoc($que_room_sel)) {
	$room_no=$row['room_no'];
	$cat=$row['category_id'];
	$cat_sel="SELECT * FROM category  WHERE category_id='$cat'";
	$que_cat_sel=mysqli_query($conn,$cat_sel);
while($row = mysqli_fetch_assoc($que_cat_sel)) {
	$cat_name=$row['category_name'];
	?>
    

  <tr>
  <td><?php echo $ID;?></td>
    <td><?php echo $fname;?></td>
    <td><?php echo $lname;?></td>
    <td><?php echo $cat_name;?></td>
    <td><?php echo $room_no;?></td>
    <td><?php echo $arr;?></td>
    <td><?php echo $dep;?></td>
    <td><?php echo $days;?></td>
  </tr>

	<?php }
}
}
}
?>
</table>
     </div>
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