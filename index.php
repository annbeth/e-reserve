 <?php include 'resources/index_header.php';?>
<?php
if(isset($_POST['next']))
 {
$type=$_POST['type'];
if($type=="admin")
{
header("Location: admin/hotel_login.php");
}
else if($type=="client")
{
header("Location: userLogin.php");
}
else
{
echo '<script language=javascript>alert("Please select a user type")</script>';
		echo '<script language=javascript>window.location="index.php"</script>';
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
    <style>
    {
	margin: 0;
}
html, body {
	height: 100%;
}
.page-wrap {
  min-height: 100%;
  /* equal to footer height */
	margin-bottom: -142px; 
}
.page-wrap:after {
  content: "";
  display: block;
}
.site-footer, .page-wrap:after {
  /* .push must be the same height as footer */
	height: 142px; 
}
.site-footer {
  background: rgba(65,65,200,6);
}
    </style>
    <div class="page-wrap">
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
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"onsubmit="return FormValidation()"  method="post" >
<h5>Please select user type.</h5>
    <select name="type" id="type" class="browser-default">
<option value="default">Select</option>
<option value="admin">Hotel Administrator</option>
<option value="client">Customer</option>
</select>
<input name="next" type="submit" class="button" id="next" value="Next" />
</form>

    </div>
    </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script src="js/materialize.js"></script>

    </body>
    </html>