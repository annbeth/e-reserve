
<?php require 'resources/connect.php';?>
<?php
session_start();
	?>
  <?php
  $target_dir = "uploads/";
  $icon_path = $target_dir . basename($_FILES["photo"]["name"]);
  $uploadOk = 1;
  $imageFileType = pathinfo($icon_path,PATHINFO_EXTENSION);
  // Check if image file is a actual image or fake image
  if(isset($_POST["Register"])) {
	 $hotelcode=$_POST['hotelcode'];
			$hotelname=$_POST['hotelname'];
	        $email=$_POST['businessemail'];
	        $password=$_POST['password'];
	        $cpassword=$_POST['cpassword'];
	       $phone=$_POST['phone'];
		   
		   $_SESSION['code']=$hotelcode;
	  
	  $check = getimagesize($_FILES["photo"]["tmp_name"]);
	  if($check !== false) {
		  
		  echo "File is an image - " . $check["mime"] . ".";
		   
		  $uploadOk = 1;
	  } else {
		  echo "File is not an image.";
		  $uploadOk = 0;
	  }
  }
  // Check if file already exists
  if (file_exists($icon_path)) {
	  echo "Sorry, file already exists.";
	  $uploadOk = 0;
  }
  // Check file size
  if ($_FILES["photo"]["size"] > 500000) {
	  echo "Sorry, your file is too large.";
	  $uploadOk = 0;
  }
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
	  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	  $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
	  echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
	  if (move_uploaded_file($_FILES["photo"]["tmp_name"], $icon_path)) {
		   if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
  if($cpassword==$password){
	  $sql = "INSERT INTO hotel_info (hotel_code,hotel_name,email,password,phone,icon) VALUES ('$hotelcode','$hotelname','$email','".md5($password)."','$phone','$icon_path')";

if (mysqli_query($conn, $sql)) {
	//$_SESSION['hotel_name']=$hotelname;
	$_SESSION['code']=$hotelcode;
	//$_SESSION['icon']=$icon_path;
header("Location: adm_index.php");
    echo '<script>alert("Welcome to e-Reserve.Account Created")</script>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
	}
	else{
	echo '<script>alert("Passwords do not match")</script>';
	}
} else {
  echo'<script>alert("Enter a valid email address")</script>';
}
	
	  } else {
		  echo "Sorry, there was an error uploading your file.";
	  }
  }
  
		  
  
  ?> 