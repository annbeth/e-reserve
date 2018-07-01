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
	<h2><?php echo $hotelname;?> Rooms</h2>
	<h3>Booked</h3>
   <table bgcolor="#FFFFFF"><!--main table-->
   <tr><!-- Main Table row 1-->
	<?php
	$cat_sel="SELECT * FROM category  WHERE hotel_code='$code'";
		  $que_cat_sel= mysqli_query($conn,$cat_sel);
		  $rowcount=mysqli_num_rows($que_cat_sel);
  for($x=1;$x<=$rowcount;$x++){
	  $row = mysqli_fetch_assoc($que_cat_sel);
	  $cat=$row['category_id'];
	  $cat_name=$row['category_name'];
	  ?>
	  
	   <td>
       <table>
       <tr>
	     <th bgcolor="#0099CC"><?php echo  $cat_name;?></th>
	   </tr><!--Mian Table row 1 end-->
	  
	   <tr><!--Main Table row 2-->
	     <td>
	       <table  class="highlight">
	         <tr bgcolor="#0000FF">
	             <th>Room ID</th>
	             <th>Room Number</th>
	             <th>Action</th>
             </tr>
  
	  <?php
	$room_sel="SELECT * FROM rooms  WHERE category_id='$cat' AND status='booked'";
		  $que_room_sel= mysqli_query($conn,$room_sel);
		   $count=mysqli_num_rows($que_cat_sel); 
   for($y=1;$y<=$count;$y++){
	  $row = mysqli_fetch_assoc($que_room_sel);
	  $roomID=$row['room_id'];
	  $room_no=$row['room_no'];
	  ?>
	  
	  
	        <tr>
	          <td><?php echo  $roomID;?> </td>
	          <td><?php echo  $room_no;?> </td>
	          <td><i class="material-icons">mode_edit</i></a></td>
	       </tr>
	    
	  <?php }?>
        </table>
      </td>
   </tr>
   </table>
   </td>
	  <?php
  }?>
   </tr><!--Main Table row 2 end-->
  </table>

  </br>
  
  <h3>Ready</h3>
	 <table bgcolor="#FFFFFF"><!--main table-->
   <tr><!-- Main Table row 1-->
	<?php
	$cat_sel="SELECT * FROM category  WHERE hotel_code='$code'";
		  $que_cat_sel= mysqli_query($conn,$cat_sel);
		  $rowcount=mysqli_num_rows($que_cat_sel);
  for($x=1;$x<=$rowcount;$x++){
	  $row = mysqli_fetch_assoc($que_cat_sel);
	  $cat=$row['category_id'];
	  $cat_name=$row['category_name'];
	  ?>
	  
	   <td>
       <table>
       <tr>
	     <th bgcolor="#000066"><?php echo  $cat_name;?></th>
	   </tr><!--Mian Table row 1 end-->
	  
	   <tr><!--Main Table row 2-->
	     <td>
	       <table  class="highlight">
	         <tr bgcolor="#0000FF">
	             <th>Room ID</th>
	             <th>Room Number</th>
             </tr>
  
	  <?php
	$room_sel="SELECT * FROM rooms  WHERE category_id='$cat' AND status='ready'";
		  $que_room_sel= mysqli_query($conn,$room_sel);
		   $count=mysqli_num_rows($que_cat_sel); 
   for($y=1;$y<=$count;$y++){
	  $row = mysqli_fetch_assoc($que_room_sel);
	  $roomID=$row['room_id'];
	  $room_no=$row['room_no'];
	  ?>
	  
	  
	        <tr>
	          <td><?php echo  $roomID;?> </td>
	          <td><?php echo  $room_no;?> </td>
	       </tr>
	    
	  <?php }?>
        </table>
      </td>
   </tr>
   </table>
   </td>
	  <?php
  }?>
   </tr><!--Main Table row 2 end-->
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