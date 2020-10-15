<?php
require('db.php');
include("auth.php"); //include auth.php file on all secure pages 

function getUsersID($con, $uname) {
	//find user id from session name
	$query = "SELECT id FROM members WHERE username = '$uname' LIMIT 1";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
	return $row['id'];
}

if (!isset($_POST['id']))
	die;

$user_one_id = $_POST['id'];
$uname = $_SESSION['username'];
$user_two_id = getUsersID($con, $uname);

/*
** status number 1 = request was accepted
** status number 2 = request was declined
*/
$status = $_POST['accepted']; 

// Updating the status of the friend request. Accepting or declining friend request sent to user 2 by user 1.
$query = "UPDATE relationship SET status = '$status', action_user_id = '$user_two_id'
  WHERE user_one_id = '$user_one_id' AND user_two_id = '$user_two_id'";													
$result = mysqli_query($con, $query);	

$success_text = 'success';
// return all our data to an AJAX call
$data['success'] = true;
$data['message'] = $success_text;
echo $success_text;

?>
