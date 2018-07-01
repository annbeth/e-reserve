
<?php require 'resources/connect.php';?>
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
            <?php include 'resources/login_header.php';?>
                <h1  class="animated fadeInDown">e-Reserve:Online Hotel Reservation</h1>
                <p class="animated fadeInUp">Discover and book the most luxurious hotels around the world.</p>                
            </div>
           
        </div>
    </div>
</div>


<div align="center">
<div class="centered">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" onSubmit="return validateForm();" class="frmLogin">
	<div class="error-message"><?php if(isset($message)) { echo $message; } ?></div>	
	<div class="field-group">
		<div><i class=' material-icons' style="color:#000">perm_identity</i>
        <label for="login" style="color:#000"><b>Hotel Code</b></label></div>
		<div><input name="user_name" id="user_name" type="text" class="input-field"></div>
	</div>
	<div class="field-group">
		<div><i class=' material-icons'>vpn_key</i>
        <label for="password" style="color:#000"><b>Password</b></label></div>
		<div><input name="password" id="password" type="password" class="input-field"> </div>
	</div>
	<div class="field-group">
		<div><input type="submit" name="login" value="Login" class="form-submit-button"></span></div></br>
        <p><a href="hotel_reg.php">Create Hotel Account</a></p>
	</div>       
</form>
</div>
      </div>
      <?php
	session_start();
	if(isset($_POST['password']) && isset($_POST['user_name']) ){
		
	$usename=$_POST['user_name'];
	$usepass=$_POST['password'];

	$uname = stripslashes($usename);
	$pass = stripslashes($usepass);
	$password=md5($pass);
	$user="select * from hotel_info where hotel_code='$uname' and password='$password'";
	 $que_user = mysqli_query($conn, $user);
	 $count=mysqli_num_rows($que_user);
	 
	 if($count==1 || $count>1){
	 	while ($row = mysqli_fetch_array($que_user)) {
		
		 }// end of while
		session_regenerate_id();
		$code=$_POST['user_name'];
		//$sessionname=$usename;
		$_SESSION['code'] = $code;
		session_write_close();
		header("location: adm_index.php");
		
	 }
	 else{
		echo '<script language=javascript>alert("WRONG USERNAME OR PASSWORD COMBINATIONS")</script>';
		echo '<script language=javascript>window.location="hotel_login.php"</script>';
		}
	
	}


?>
  
</body>
</html>