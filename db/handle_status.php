<?php
require('db.php');
include("auth.php"); //include auth.php file on all secure pages 
$username = $_SESSION['username'];
$status = $_POST['text'];
$set_status($con, $username, $status);
?>