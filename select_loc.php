	<?php require 'resources/connect.php';?>
    <?php include 'resources/header.php';?>
 <?php
 $selectErr="";
 if(isset($_POST['next']))
 {
// Start the session
session_start();
$location=$_POST['location'];
$_SESSION['location']=$location;

if($location!=="default")
{
header("Location: select_hotel.php");
}
else
{
$selectErr="Please select an Hotel";
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
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"onsubmit="return FormValidation()"  method="post" enctype="multipart/form-data">
<table align="center"cellpadding="10px"cellspacing="30px">
<tr>
<td>
    <select name="location" id="location" style="height:130%;" class="browser-default">
<option value="default">Select</option>

<?php
$location="SELECT location FROM hotel_info";
$que_location=mysqli_query($conn,$location);
while($rows=mysqli_fetch_array($que_location))
{
$location=$rows['location'];
if(@$test!=$location){
		
?>
<option value="<?php echo $location;?>"><?php echo $location;?></option>
<?php
$test=$location;
}
}
?>
</select>
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