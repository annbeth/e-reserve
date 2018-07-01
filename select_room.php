

	<?php require 'resources/connect.php';?>
    <?php include 'resources/header.php';?>
 <?php
 // Start the session
session_start();
if($_SESSION['uname']==""){
	header("Location: userLogIn.php");
	}
$code=$_SESSION['code'];
 $cat=$_SESSION['category'];
 $arr_date=$_SESSION['arr_date'];
 $dep_date=$_SESSION['dep_date'];
 $selectErr="";
 if(isset($_POST['next']))
 {
$room=$_POST['room'];
$_SESSION['room']=$room;
if($room!=="default")
{
header("Location: booking.php");
}
else
{
$selectErr="Please select a Hotel";
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
    <script src="js/script.js"></script>
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
    <form action=""  method="post" enctype="multipart/form-data">
<table align="center"cellpadding="10px"cellspacing="30px">
<tr>
<td>
    <select name="room" id="room" style="height:130%;" class="browser-default">
<option value="default">Select</option>

<?php
$room="SELECT * FROM rooms WHERE category_id=$cat AND status='ready' ";
//$room="SELECT rooms.* FROM rooms INNER JOIN category ON rooms.category_id=category.category_id WHERE category.hotel_code='$code'";
$que_room=mysqli_query($conn,$room);
while($rows=mysqli_fetch_array($que_room))
{
$room=$rows['room_id'];
?>
<option value="<?php echo $room;?>">Room Number: <?php echo $rows['room_no'];?></option>
<?php
}
?>
<?php
$start_date = strtotime($arr_date);
$end_date = strtotime($dep_date);
$date="SELECT * FROM booking";
	$que_date=mysqli_query($conn,$date);
	while($row = mysqli_fetch_array($que_date)) {
		$arr=$row['arr_date'];
		$dep=$row['dep_date'];
		$start = strtotime($arr);
        $end = strtotime($dep);
		$b_room=$row['room_ID'];
		if($end_date<$start||$end<$start_date){
			if(@$nom!==$b_room){
				$book_room="SELECT room_no FROM rooms WHERE room_id=$b_room ";
				$que_book_room=mysqli_query($conn,$book_room);
while($row=mysqli_fetch_array($que_book_room))
{
//$book_room=$row['room_id'];
				?>
      <option value="<?php echo $b_room;?>">Room Number: <?php echo $row['room_no'];?></option>
<?php
}
			$nom=$b_room;
		}
			}
			
		}
?>
</select>
<span style="color:#F00"><b><?php echo $selectErr;?></b></span>
</td>
</tr>
<tr>
<td><input name="next" type="submit" class="button" id="next" value="Next" />
 </td>
</tr>
</table>
</form>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script src="js/materialize.js"></script>
    </body>
    </html>