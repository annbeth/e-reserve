<?php require 'resources/connect.php';?>
    <?php include 'resources/header.php';?>
    <?php
	session_start();
	if($_SESSION['uname']==""){
	header("Location: userLogIn.php");
	}
	$uname=$_SESSION['uname'];
$code=$_SESSION['code'];
 $room=$_SESSION['room'];
 $days=$_SESSION['days'];
 $cat_sel="SELECT category_id FROM rooms  WHERE room_id='$room'";
$que_cat_sel=mysqli_query($conn,$cat_sel);
while($row = mysqli_fetch_assoc($que_cat_sel)) {
		$cat=$row['category_id'];
}
		$price_sel="SELECT category_price FROM category  WHERE category_id='$cat'";
		$que_price_sel=mysqli_query($conn,$price_sel);
while($row = mysqli_fetch_assoc($que_price_sel)) {
	$pri=$row['category_price'];
	$price=$days*$pri;
}
	$book_sel="SELECT * FROM booking  WHERE room_id='$room'";
		$que_book_sel=mysqli_query($conn,$book_sel);
while($row = mysqli_fetch_assoc($que_book_sel)) {
	$booking_ID=$row['booking_ID'];
}
 if(isset($_POST['pay'])){
	 $transactionID=$_POST['tId'];
	  $sql = "INSERT INTO payment (transaction_ID,booking_ID,amount,status) VALUES ('$transactionID','$booking_ID','$price','paid')";
if (mysqli_query($conn, $sql)) {


header("Location: viewBooking.php");
    
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
                    <p class="animated fadeInUp">Discover and book the most luxurious hotels around the world.</p>                
                </div>
                <a href="#information" class="arrow-nav scroll wowload fadeInDownBig"><i class="fa fa-angle-down"></i></a>
            </div>
        </div>
    </div>
    <div align="center">
    <h2>Welcome to e-Reserve</h2>
    <div class="formElement">
    <?php
	$user="SELECT * FROM users WHERE username='syl'";
	$que_user=mysqli_query($conn,$user);
	while($row = mysqli_fetch_array($que_user)) {
		$fname=$row['fname'];
		$lname=$row['lname'];
		$phone=$row['phone'];
		}
		?>
        <?php
		
    ?>
    <form class="" action="" method="post" >
    <h2>Your total pay in KES: <?php echo $price;?> </h2>
    <h3>Please pay via MPesa to 0707724479</h3>  
<input name="tId" type="text" class="TField" id="tId"  required="required"  style="text-transform:uppercase" placeholder="Enter MPesa Transaction ID"/>
<label for="phone">MPesa Transaction Id</label></br>
<input name="pay" type="submit" class="button" id="pay" value="Pay" />
  </form>
    </div>

    </div>
    
    </body>
    </html>