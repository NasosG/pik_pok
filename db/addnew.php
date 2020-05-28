<?php

require('db.php');
require('errorFuncts.php');
session_start();

$date = date("Y/m/d");
$username = $_SESSION['username'];
$target_dir = "../uploads/pik_pok_pics/";
$general_dir = "uploads/pik_pok_pics/";
$file_up = mysqli_real_escape_string($con, $_FILES["fileToUpload"]["name"]);
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
	$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	if($check !== false) {
		echo "File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
	} 
	else {
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
if ($_FILES["fileToUpload"]["size"] > 20000000) {
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
} 
else 
{
	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	} 
	else {
		echo "Sorry, there was an error uploading your file.";
	}
  
	mysqli_set_charset($con,"utf8");
	$query = "INSERT INTO images(photo_name, photo_likes, photo_path, username, photo_tag, date_posted) 
	VALUES ('$file_up', 0, '$general_dir' ,'$username', null, '$date')";

	$result = mysqli_query($con, $query) or die("Not able to execute the query");
}

//close the connection
mysqli_close($con);
// Redirect user to index.php
header("Location: ../index.php");
?>

