<?php
require('db.php');
include("auth.php"); //include auth.php file on all secure pages 

$uname = $_SESSION['username'];

//find user id from session name
$query = "SELECT id FROM members WHERE username = '$uname'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
$user_id = $row['id'];

function make_dir($path, $mode) {
    return is_dir($path) || mkdir($path, $mode, true);
}

if ($result) {
	if (make_dir("../uploads/users/".$user_id."/", 0755)) {
		$target_dir = "../uploads/users/".$user_id."/";
		$general_dir = "uploads/users/".$user_id."/";
	}
	else "an unexpected error occurred while creating the directory";
}
else {
	exit("database error occurred");
}
$query_old_pic = "SELECT profile_pic, picture_path FROM members WHERE username = '$uname'";
		
$result = mysqli_query($con,$query_old_pic);
		
if ($result && mysqli_num_rows($result)>0) {
	$row = mysqli_fetch_array($result);
	if ($row["picture_path"] === 'images/') /* this means that user wants to continue with the default avatar and he/she didn't update his/her profile photo*/
		header("Location: ../profile3.php"); /* so just redirect the user to his 'new' profile page */
	else
		unlink('../'.$row["picture_path"].$row["profile_pic"]);
}


$file_up = mysqli_real_escape_string($con, $_FILES["fileToUpload"]["name"]);
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$bio = !empty($_POST['bio']) ? $_POST['bio'] : NULL;
	
	// Check if image file is a actual image or fake image
	if (isset($_POST["submit"])) {
	  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	  if ($check !== false) {
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
	if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" && $imageFileType != "webp") {
	  echo "Sorry, only JPG, JPEG, PNG, WEBP & GIF files are allowed.";
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
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	 
		mysqli_set_charset($con,"utf8");
		
		$query = "UPDATE members
		SET profile_pic = '$file_up', picture_path='$general_dir', bio='$bio'
		WHERE username = '$uname'";
		
		$result = mysqli_query($con,$query);
		
		if ($result) {
			header("Location: ../profile3.php");
		}
		else {
			echo "error occurred";
		}	
	}

?>

