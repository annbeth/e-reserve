<?php require 'resources/connect.php';?>
<?php
session_start();
$code=$_SESSION['code'];
	?>
  <?php
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["photo"]["name"]);
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  // Check if image file is a actual image or fake image
  if(isset($_POST["Submit"])) {
	 $hotellocation=$_POST['location'];
	  $hotelinfo=$_POST['info'];
	  //$code = $_POST['code'];
	  
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
  if (file_exists($target_file)) {
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
	  if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
		   $sql = "UPDATE hotel_info SET location='$hotellocation',description='$hotelinfo',photo_path='$target_file' WHERE hotel_code=$code";
  if (mysqli_query($conn, $sql)) {
	  //header("Location: hotelInfo.php?msg=$code");
	  header("Location: hotelInfo.php");
	  
  } else {
	  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
	
	  } else {
		  echo "Sorry, there was an error uploading your file.";
	  }
  }
  
		  
  
  ?> 
