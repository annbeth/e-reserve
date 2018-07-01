<?php require 'resources/connect.php';
?>
    <?php include 'resources/header.php';?>
 <?php
 session_start();
 if($_SESSION['location']=="")
 {
	 echo '<script language=javascript>alert("Please select a location proceed")</script>';
		echo '<script language=javascript>window.location="select_loc.php"</script>';
	 }
	 else{
 $location=$_SESSION['location'];
 if(isset($_POST['next']))
 {
// Start the session

$code=$_POST['select'];
$_SESSION['code']=$code;

header("Location: select_cat.php");
 }}
?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <title>e-Reserve | Online Hotel Resevation</title>
    <!--Import Google Icon Font-->
          <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
          <!--Import materialize.css-->
   <!--<link type="text/css" rel="stylesheet" href="css/materialize.css" media="screen,projection"/>-->
    <link type="text/css" rel="stylesheet" href="css/style.css" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/animate.css" media="screen,projection"/>
    
          <!--Let browser know website is optimized for mobile-->
          <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
.dropdownimg {
    position: relative;
    display: inline-block;
}

.dropdownimg-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdownimg:hover .dropdownimg-content {
    display: block;
}

</style>
    </head>
    
    <body>
    <script src="/js/script.js"></script>
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
    <div>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"onsubmit="return FormValidation()"  method="post">
    <table class="customers">
    <tr>
    <th>Hotel Name</th>
     <th>Hotel Location</th>
      <th>Hotel Description</th>
       <th>Hotel Photo</th>
       <th>Action</th>
    </tr>
      <?php
	$hotel = "SELECT hotel_code, hotel_name, location, description,photo_path FROM hotel_info WHERE location='$location'";
  $que_hotel = mysqli_query($conn, $hotel);
  
  //if (mysqli_num_rows($que_hotel) > 0) {
	  // output data of each row
	  while($rows = mysqli_fetch_array($que_hotel)) {
		  $code=$rows['hotel_code'];
		  $hotelname=$rows["hotel_name"];
		  $loc=$rows["location"];
		  $desc=$rows["description"];
		  $img=$rows['photo_path'];
		  
	  
		  ?>
		  <tr>
		  <td><?php echo $hotelname;?></td>
		  <td><?php echo $loc;?></td>
		   <td><?php echo $desc; ?> </td>
		    <td> <div class='dropdownimg'> <img src='admin/<?php echo $img?>' height='70' width='70'> <div class='dropdownimg-content'> <img src='admin/<?php echo $img?>' height='300' width='200'>
  </div>
</div> </td>
<td> <input name='select' type='radio' class="radio"  value='<?php echo $code;?>' id='radio'><label for='radio'>Select Hotel</label>Select Hotel</label></td>
<?php 
	  }
  //}
	?>
    </table>
    <input name="next" type="submit" class="button" id="next" value="Next" />
    </form>
      
      
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script src="../js/materialize.js"></script>
    </body>
    </html>
     
     