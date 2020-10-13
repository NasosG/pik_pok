<?php
require('db.php');
include("auth.php"); //include auth.php file on all secure pages 

$data = array();
$uname = $_SESSION['username'];

if (isset($_POST['ajax']) && isset($_POST['receiver_id']) ) {
	$receiver_id= $_POST['receiver_id'];
	// return all our data to an AJAX call
	$data['success'] = true;
	$data['message'] = $receiver_id;
	echo $receiver_id;
}	

?>