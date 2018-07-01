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
  <h2><?php echo $hotelname;?> Payments</h2>
  <table class="highlight" bgcolor="#FFFFFF">
  <tr bgcolor="#0000FF">
  <th scope="col" bgcolor="#0099FF">ID</th>
  <th scope="col" bgcolor="#0099FF">Transaction ID</th>
    <th scope="col" bgcolor="#0099FF">First Name</th>
    <th scope="col" bgcolor="#0099FF">Last Name</th>
    <th scope="col" bgcolor="#0099FF">Phone</th>
    <th scope="col" bgcolor="#0099FF">Booking ID</th>
    <th scope="col" bgcolor="#0099FF">Room No</th>
    <th scope="col" bgcolor="#0099FF">Amount</th>
    <th scope="col" bgcolor="#0099FF">Status</th>
  </tr>

  <?php
  $booking_sel="SELECT * FROM booking  WHERE hotel_code='$code'";
		$que_booking_sel= mysqli_query($conn,$booking_sel);
while($row = mysqli_fetch_assoc($que_booking_sel)) {
	$ID=$row['booking_ID'];
	$uname=$row['username'];
	$room=$row['room_ID'];
	$user_sel="SELECT * FROM users  WHERE username='$uname'";
		$que_user_sel=mysqli_query($conn,$user_sel);
while($row = mysqli_fetch_assoc($que_user_sel)) {
	$fname=$row['fname'];
	$lname=$row['lname'];
	$phone=$row['phone'];
	$room_sel="SELECT * FROM rooms  WHERE room_ID='$room'";
	$que_room_sel=mysqli_query($conn,$room_sel);
while($row = mysqli_fetch_assoc($que_room_sel)) {
	$room_no=$row['room_no'];
	$pay_sel="SELECT * FROM payment  WHERE booking_ID='$ID'";
	$que_pay_sel=mysqli_query($conn,$pay_sel);
while($row = mysqli_fetch_assoc($que_pay_sel)) {
	$pID=$row['payment_ID'];
	$tID=$row['transaction_ID'];
	$amt=$row['amount'];
	$status=$row['status'];
	?>
    

  <tr>
  <td><?php echo $pID;?></td>
  <td><?php echo $tID;?></td>
    <td><?php echo $fname;?></td>
    <td><?php echo $lname;?></td>
    <td><?php echo $phone;?></td>
    <td><?php echo $ID;?></td>
    <td><?php echo $room_no;?></td>
    <td><?php echo $amt;?></td>
    <td><?php echo $status;?></td>
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