<?php
	require('db.php');
	include("auth.php"); //include auth.php file on all secure pages 

	$data = array();
	$uname = $_SESSION['username'];
	$time_saved = date("Y-m-d H:i:s");

if (isset($_POST['photo_id'])) {

	$post_id = $_POST['photo_id'];

	// find user id from session name
	$query = "SELECT id FROM members WHERE username = '$uname'";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
	$user_id = $row['id'];
	
	mysqli_set_charset($con,"utf8");
	$query = "INSERT INTO saved_posts (user_id, post_id, time_saved) VALUES ('$user_id', '$post_id', '$time_saved') "; 													
	$result = mysqli_query($con, $query);	
	
}
	

?>