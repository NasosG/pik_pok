<?php
	require('db.php');
	include("auth.php"); //include auth.php file on all secure pages 

	$data = array();
	$comment_text = $_POST['comment-text'];
	// return all our data to an AJAX call
	$data['success'] = true;
	$data['message'] = $comment_text;
	echo $comment_text;
?>