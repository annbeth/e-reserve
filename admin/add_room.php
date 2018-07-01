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
<h3>Please add hotel rooms</h3>
<form action="" method="post" enctype="multipart/form-data">
<div class="formElement">
<table align="center"cellpadding="10px"cellspacing="30px">
<tr>
<td>
<select style="height:130%;"name="category" id="category" class="browser-default">
<option value="default"default>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SELECT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
<?php
$code=$_SESSION["code"];
$displaycat="SELECT * FROM category WHERE hotel_code=$code";
$display_cat=mysqli_query($conn,$displaycat);
while($rows=mysqli_fetch_array($display_cat))
{
$my_cat_id=$rows['category_id'];
?>
<option value="<?php echo $my_cat_id;?>"><?php echo $rows['category_name'];?></option>
<?php
}
?>
</select>
</td>
<td style="color:green;font-weight:bold;">
</tr>
</table>
 <input name="number" type="text" class="TField" id="number" required="required" placeholder="Enter Number of Rooms" />
<input name="Submit" type="submit" class="button" id="Submit" value="Submit" />
</div>
</form>
</div>
<?php
if(isset($_POST['Submit'])){
			$number=$_POST['number'];
			$cat_id=$_POST['category'];
for($x=1;$x<=$number;$x++){
		$sql="INSERT INTO rooms (category_id,room_no,status) VALUES ('$cat_id','$x','ready')";
		if (mysqli_query($conn, $sql)) {
   echo '<script><alert>Rooms added</alert></script>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
		}
}
		  
?>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
</body>
</html>