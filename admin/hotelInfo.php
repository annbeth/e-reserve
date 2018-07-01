<?php include 'resources/connect.php';?>
<?php include 'resources/header.php';?>
 <?php
 session_start();
if($_SESSION['code']==""){
	header("Location: hotel_reg.php");
	}

	$code=$_SESSION['code'];

	?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>e-Reserve | Online Hotel Resevation</title>
</head>

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
<?php
		$hotelinfo = "SELECT * FROM hotel_info WHERE hotel_code=$code";
  $que_hotelinfo = mysqli_query($conn, $hotelinfo);
  
  if (mysqli_num_rows($que_hotelinfo) > 0) {
	  // output data of each row
	  while($row = mysqli_fetch_array($que_hotelinfo)) {
echo "<div class='banner'>";    	   
  echo "<img src='".$row['photo_path']."'  class='img-responsive' alt='slide'>";
   echo "<div class='welcome-message'>";
    echo "<div class='wrap-info'>";
     echo "<div class='information'>";
         echo "<h1  class='animated fadeInDown'>e-Reserve:Online Hotel Reservation</h1>";
             echo "<p class='animated fadeInUp'>Discover and book the most luxurious hotels around the world</p>";                
            echo "</div>";
           echo "<a href='#information' class='arrow-nav scroll wowload fadeInDownBig'><i class='fa fa-angle-down'></i></a>";
       echo "</div>";
   echo "</div>";
echo"</div>";
echo "<div align='center'>";

        echo "<h2>Welcome to " . $row["hotel_name"]."</h2>";
   


echo "<table class='customers'>";


           echo "<tr>";
		  echo "<td> Hotel Name: " .$row['hotel_name']."</td>" ;
		  echo "</tr>";
		  echo "<tr>";
		  echo "<td> Email:  " .$row["email"]. "</td>" ;
		  echo "</tr>";
		  echo "<tr>";
		   echo "<td> UserName: ".$row["location"]. "</td>";
		   echo "</tr>";
		    echo "<tr>";
		   echo "<td> UserName: ".$row["description"]. "</td>";
		   echo "</tr>";
		   echo "<tr>";
		    echo "<td> Phone Number: ".$row["phone"]. "</td>";
			echo "</tr>";
		   echo "<tr>";
		    echo "<td> </td>";
			echo "</tr>";
	 }
} else {
    echo "0 results";
}
	?>
     
    </table>
</div>





<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>

</body>
</html>