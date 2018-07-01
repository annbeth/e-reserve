<?php require 'resources/connect.php';
?>
   
    
 <?php
// Start the session
session_start();
if($_SESSION["uname"]==""){
	header("Location: userLogIn.php");
	}
$name=$_SESSION['name'];
$uname=$_SESSION['uname'];
?>
    
    <!DOCTYPE html PUBLIC "-//W3C//Dtd XHTML 1.0 tdansitional//EN" "http://www.w3.org/td/xhtml1/Dtd/xhtml1-tdansitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <title>e-Reserve | Online Hotel Reservation</title>
    <!--Import Google Icon Font-->
          <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
          <!--Import materialize.css-->
   <link type="text/css" rel="stylesheet" href="css/materialize.css" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/style.css" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/animate.css" media="screen,projection"/>
    
          <!--Let browser know website is optimized for mobile-->
          <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  
    </head>
    
    <body>
    <script src="/js/script.js"></script>
    <div class="banner">    	   
        <img src="images/banner.jpg"  class="img-responsive" alt="slide">
        <div class="welcome-message">
        <?php include 'resources/header.php';?>
            <div class="wrap-info">
                <div class="information">
                 
                    <h1  class="animated fadeInDown">e-Reserve:Online Hotel Reservation</h1>
                    <h2> <?php
	       echo "<h2> Welcome ".$name."</h2>";
	?></h2>
                    <p class="animated fadeInUp">Discover and book the most luxurious hotels around the world.</p>                
                </div>
               <!--<a href="#information" class="arrow-nav scroll wowload fadeInDownBig"><i class="fa fa-angle-down"></i></a>-->
            </div>
        </div>
    </div>
    <div align="center">
    <table class="customer" width="50%">
     <?php
	$user = "SELECT * FROM users WHERE username='$uname'";
  $que_user = mysqli_query($conn, $user);
  
  if (mysqli_num_rows($que_user) > 0) {
	  // output data of each row
	  while($row = mysqli_fetch_array($que_user)) {
           echo "<tr>";
		  echo "<td> First Name: " . $row["fname"]."</td>" ;
		  echo "</tr>";
		  echo "<tr>";
		  echo "<td> Last Name:  " . $row["lname"]. "</td>" ;
		  echo "</tr>";
		  echo "<tr>";
		   echo "<td> UserName: ". $row["username"]. "</td>";
		   echo "</tr>";
		   echo "<tr>";
		    echo "<td> Phone Number: ". $row["phone"]. "</td>";
			echo "</tr>";
		   
	   }
  }
	?>
     <tr height="10%">
     <td>&nbsp;</td>
     </tr>
    </table>
      
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script src="../js/materialize.js"></script>
    </body>
    </html>
     
     