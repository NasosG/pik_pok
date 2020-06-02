<?php
	require('db.php');
	include("auth.php"); //include auth.php file on all secure pages 

	$data = array();
	$comment_text = $_POST['comment-text'];
	$uname = $_SESSION['username'];
	$comment_date = date("Y-m-d H:i:s");

	// find user id from session name
	$query = "SELECT id FROM members WHERE username = '$uname'";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
	$user_id = $row['id'];
	$photo_id = $_POST['photo_id'];

	$query = "INSERT INTO post_comments (post_id , user_id, comment_text, time_commented) VALUES ('$photo_id', '$user_id', '$comment_text', '$comment_date') "; 													
	$result = mysqli_query($con, $query);	


	// return all our data to an AJAX call
	$data['success'] = true;
	$data['message'] = $comment_text;
	echo $comment_text;
?>